<x-layout.default>
    <div>
        <ul class="flex space-x-2 rtl:space-x-reverse">
            <li>
                <a href="/users" class="text-primary hover:underline">User</a>
            </li>
            <li class="before:content-['/'] ltr:before:mr-1 rtl:before:ml-1 dark:text-white-dark">
                <span>Add</span>
            </li>
        </ul>
        <div class="pt-5" x-data="form">
            <div class="panel">
                <div class="flex items-center justify-between mb-5">
                    <h5 class="font-semibold text-lg dark:text-white-light">Add Data User</h5>

                </div>
                <div>
                    <!-- custom styles -->
                    <form class="space-y-5 dark:text-white-dark" @submit.prevent="submitForm4()">

                        <div :class="[isSubmitForm4 ? (validated.name ? 'has-error' : 'has-success') : '']">
                            <label for="customName">Nama</label>
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

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                            <div :class="[isSubmitForm4 ? (validated.email ? 'has-error' : 'has-success') : '']">
                                <label for="customEmail">Email</label>
                                <input id="customEmail" type="text" placeholder="Insert email" class="form-input"
                                    x-model="form4.email" />
                                <template x-if="isSubmitForm4 && !validated.email">
                                    <p class="text-[#1abc9c] mt-1">Looks Good!</p>
                                </template>
                                <template x-if="isSubmitForm4 && validated.email">
                                    <p class="text-danger mt-1">
                                        <span x-text="validated.email"></span>
                                    </p>
                                </template>
                            </div>

                            <div :class="[isSubmitForm4 ? (validated.password ? 'has-error' : 'has-success') : '']">
                                <label for="password">Password</label>
                                <input id="password" type="password" placeholder="Insert Password" class="form-input"
                                    x-model="form4.password" />
                                <template x-if="isSubmitForm4 && !validated.password">
                                    <p class="text-[#1abc9c] mt-1">Looks Good!</p>
                                </template>
                                <template x-if="isSubmitForm4 && validated.password">
                                    <p class="text-danger mt-1">
                                        <span x-text="validated.password"></span>
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
                    email: '',
                    password: '',
                    address: '',
                    contact: '',
                    postal_code: '',
                },
                validated: {
                    name: '',
                    email: '',
                    password: '',
                    address: '',
                    contact: '',
                    postal_code: '',
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
                    const url = "{{ route('users.store') }}";
                    const formData = {
                        ...this.form4,
                        _token: csrfToken
                    };
                    fetch(url, {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                                'X-CSRF-TOKEN': csrfToken
                            },
                            body: JSON.stringify(formData)
                        })
                        .then(response => {
                            if (response.ok) {
                                this.showMessage('Data berhasil terkirim', 'success');
                                window.location.href = "{{ route('users.index') }}";
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
