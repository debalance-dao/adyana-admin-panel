<x-layout.default>
    <script src="/assets/js/file-upload-with-preview.iife.js"></script>
    <div>
        <ul class="flex space-x-2 rtl:space-x-reverse">
            <li>
                <a href="/projects" class="text-primary hover:underline">Project</a>
            </li>
            <li class="before:content-['/'] ltr:before:mr-1 rtl:before:ml-1 dark:text-white-dark">
                <span>Add</span>
            </li>
        </ul>
        <div class="pt-5" x-data="form">
            <div class="panel">
                <div class="flex items-center justify-between mb-5">
                    <h5 class="font-semibold text-lg dark:text-white-light">Add Data Project</h5>

                </div>
                <div>
                    <!-- custom styles -->
                    <form class="space-y-5 dark:text-white-dark" @submit.prevent="submitForm4()">

                        <div :class="[isSubmitForm4 ? (validated.name ? 'has-error' : 'has-success') : '']">
                            <label for="customName">Name</label>
                            <input id="customName" type="text" placeholder="Insert Name" class="form-input"
                                x-model="form4.name" />
                            <template x-if="isSubmitForm4 && !validated.name">
                                <p class="text-[#1abc9c] mt-1">Looks Good!</p>
                            </template>
                            <template x-if="isSubmitForm4 && validated.name">
                                <p class="text-danger mt-1">
                                    <span x-text="validated.name"></span>
                                </p>
                            </template>
                        </div>

                        <div :class="[isSubmitForm4 ? (validated.description ? 'has-error' : 'has-success') : '']">
                            <label for="customDescription">Description</label>
                            <textarea id="customDescription" type="text" rows="4" placeholder="Insert Description" class="form-input"
                                x-model="form4.description"></textarea>
                            <template x-if="isSubmitForm4 && !validated.description">
                                <p class="text-[#1abc9c] mt-1">Looks Good!</p>
                            </template>
                            <template x-if="isSubmitForm4 && validated.description">
                                <p class="text-danger mt-1">
                                    <span x-text="validated.description"></span>
                                </p>
                            </template>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                            <div :class="[isSubmitForm4 ? (validated.funds_target ? 'has-error' : 'has-success') : '']">
                                <label for="customfunds_target">Funds Target *Ady Coin</label>
                                <input id="customfunds_target" type="number" placeholder="Insert Funds Target"
                                    class="form-input" x-model="form4.funds_target" />
                                <template x-if="isSubmitForm4 && !validated.funds_target">
                                    <p class="text-[#1abc9c] mt-1">Looks Good!</p>
                                </template>
                                <template x-if="isSubmitForm4 && validated.funds_target">
                                    <p class="text-danger mt-1">
                                        <span x-text="validated.funds_target"></span>
                                    </p>
                                </template>
                            </div>

                            <div :class="[isSubmitForm4 ? (validated.days_target ? 'has-error' : 'has-success') : '']">
                                <label for="customdays_target">Days Target</label>
                                <input id="customdays_target" type="number" placeholder="Insert Days Target"
                                    class="form-input" x-model="form4.days_target" />
                                <template x-if="isSubmitForm4 && !validated.days_target">
                                    <p class="text-[#1abc9c] mt-1">Looks Good!</p>
                                </template>
                                <template x-if="isSubmitForm4 && validated.days_target">
                                    <p class="text-danger mt-1">
                                        <span x-text="validated.days_target"></span>
                                    </p>
                                </template>
                            </div>
                        </div>

                        <div class="grid grid-cols-1">
                            <div :class="[isSubmitForm4 ? (validated.image_file ? 'has-error' : 'has-success') : '']">
                                <!-- single file -->
                                <div class="custom-file-container" data-upload-id="myFirstImage"></div>

                                <!-- script -->
                                <script>
                                    let file = new FileUploadWithPreview.FileUploadWithPreview('myFirstImage', {
                                        images: {
                                            baseImage: "/assets/images/file-preview.svg",
                                            backgroundImage: '',
                                        },
                                        text: {
                                            chooseFile: "Choose Image...",
                                            label: "Upload Project Image",
                                        },
                                    });
                                </script>
                                <template x-if="isSubmitForm4 && !validated.image_file">
                                    <p class="text-[#1abc9c] mt-1">Looks Good!</p>
                                </template>
                                <template x-if="isSubmitForm4 && validated.image_file">
                                    <p class="text-danger mt-1">
                                        <span x-text="validated.image_file"></span>
                                    </p>
                                </template>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary !mt-6">Submit Form</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- script -->
    <script>
        document.addEventListener("alpine:init", () => {
            Alpine.data("form", () => ({
                form4: {
                    name: '',
                    description: '',
                    funds_target: '',
                    days_target: '',
                    image_file: null,
                },
                validated: {
                    name: '',
                    description: '',
                    funds_target: '',
                    days_target: '',
                    image_file: null,
                },

                isSubmitForm4: false,
                submitForm4() {
                    this.isSubmitForm4 = true;
                    Object.keys(this.validated).forEach(key => this.validated[key] = '');
                    const hasErrors = Object.values(this.validated).some(error => error !== '');
                    if (hasErrors) {
                        this.showMessage('Form validation failed.', 'error');
                        return; // Menghentikan proses pengiriman formulir jika validasi gagal
                    }
                    //form validated success
                    this.showMessage('Form submitted successfully.');
                    this.sendFormData();
                },
                sendFormData() {
                    const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute(
                        'content');
                    const url = "{{ route('projects.store') }}";
                    this.form4.image_file = file.cachedFileArray[0] || '';

                    const formData = new FormData();
                    formData.append('name', this.form4.name);
                    formData.append('description', this.form4.description);
                    formData.append('funds_target', this.form4.funds_target);
                    formData.append('days_target', this.form4.days_target);
                    formData.append('image_file', this.form4.image_file);
                    formData.append('_token', csrfToken);

                    fetch(url, {
                            method: 'POST',
                            headers: {
                                'X-CSRF-TOKEN': csrfToken
                            },
                            body: formData
                        })
                        .then(response => {
                            if (response.ok) {
                                this.showMessage('Data berhasil terkirim', 'success');
                                window.location.href = "{{ route('projects.index') }}";
                            } else {
                                // Tangani respons JSON dari server
                                response.json().then(data => {
                                    if (response.status === 422 && data.errors) {
                                        // Tampilkan pesan kesalahan validasi di bawah inputan form
                                        Object.keys(data.errors).forEach(key => {
                                            const errorMessage = data.errors[key][
                                                0
                                            ]; // Ambil pesan kesalahan pertama dari setiap field
                                            this.validated[key] = errorMessage;
                                        });
                                    } else {
                                        // Tampilkan pesan kesalahan umum
                                        this.showMessage('Gagal mengirim data', 'error');
                                    }
                                });
                            }
                        })
                        .catch(error => {
                            this.showMessage('Terjadi kesalahan: ' + error.message, 'error');
                        });
                },
                showMessage(msg = '', type = 'success') {
                    const toast = window.Swal.mixin({
                        toast: true,
                        position: 'top',
                        showConfirmButton: false,
                        timer: 3000
                    });
                    toast.fire({
                        icon: type,
                        title: msg,
                        padding: '10px 20px'
                    });
                },
            }));
        });
    </script>
</x-layout.default>
