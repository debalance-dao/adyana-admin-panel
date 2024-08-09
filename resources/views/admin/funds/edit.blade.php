<x-layout.default>
    <script src="/assets/js/file-upload-with-preview.iife.js"></script>
    <div>
        <ul class="flex space-x-2 rtl:space-x-reverse">
            <li>
                <a href="/funds" class="text-primary hover:underline">Project</a>
            </li>
            <li class="before:content-['/'] ltr:before:mr-1 rtl:before:ml-1 dark:text-white-light">
                <span>Edit</span>
            </li>
        </ul>
        <div class="pt-5" x-data="form">
            <div class="panel">
                <div class="flex items-center justify-between mb-5">
                    <h5 class="font-semibold text-lg dark:text-white-light">Edit Data Project</h5>

                </div>
                <div>
                    <!-- custom styles -->
                    <form class="space-y-5" @submit.prevent="submitForm4()">
                        <div :class="[isSubmitForm4 ? (validated.name ? 'has-error' : 'has-success') : '']">
                            <label for="customName">Name</label>
                            <input id="customName" type="text" placeholder="Insert Name" disabled
                                class="form-input outline-none border-r-0 border-l-0 ltr:rounded-l-none rtl:rounded-r-none ltr:rounded-r-none rtl:rounded-l-none flex-1"
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
                            <div
                                :class="[isSubmitForm4 ? (validated.funds_collected ? 'has-error' : 'has-success') : '']">
                                <label for="customfunds_collected">Funds Collected *Ady Coin</label>
                                <input id="customfunds_collected" type="number" placeholder="Insert Funds Collected"
                                    class="form-input" x-model="form4.funds_collected" />
                                <template x-if="isSubmitForm4 && !validated.funds_collected">
                                    <p class="text-[#1abc9c] mt-1">Looks Good!</p>
                                </template>
                                <template x-if="isSubmitForm4 && validated.funds_collected">
                                    <p class="text-danger mt-1">
                                        <span x-text="validated.funds_collected"></span>
                                    </p>
                                </template>
                            </div>

                            <div
                                :class="[isSubmitForm4 ? (validated.total_investor ? 'has-error' : 'has-success') : '']">
                                <label for="customtotal_investor">Total Investor</label>
                                <input id="customtotal_investor" type="number" placeholder="Insert Total Investor"
                                    class="form-input" x-model="form4.total_investor" />
                                <template x-if="isSubmitForm4 && !validated.total_investor">
                                    <p class="text-[#1abc9c] mt-1">Looks Good!</p>
                                </template>
                                <template x-if="isSubmitForm4 && validated.total_investor">
                                    <p class="text-danger mt-1">
                                        <span x-text="validated.total_investor"></span>
                                    </p>
                                </template>
                            </div>
                        </div>

                        <div class="flex items-center justify-between pt-6">
                            <h5 class="font-semibold text-lg dark:text-white-light">Add Funds Collection</h5>
                        </div>

                        <!-- Form for adding funds -->
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                            <div
                                :class="{
                                    'has-error': isSubmitForm4 && validated
                                        .lname,
                                    'has-success': isSubmitForm4 && !validated.lname
                                }">
                                <label for="customlname">Name Allocation</label>
                                <input id="customlname" type="text" placeholder="Enter name allocation"
                                    class="form-input" x-model="fundsAllocation.name">
                                <template x-if="isSubmitForm4 && validated.lname">
                                    <p class="text-danger mt-1" x-text="validated.lname"></p>
                                </template>
                            </div>
                            <div
                                :class="{
                                    'has-error': isSubmitForm4 && validated
                                        .lpercentage,
                                    'has-success': isSubmitForm4 && !validated.lpercentage
                                }">
                                <label for="customlpercentage">Percentage</label>
                                <input id="customlpercentage" type="number" placeholder="Enter percentage"
                                    class="form-input" x-model="fundsAllocation.percentage">
                                <template x-if="isSubmitForm4 && validated.lpercentage">
                                    <p class="text-danger mt-1" x-text="validated.lpercentage"></p>
                                </template>
                            </div>
                        </div>

                        <button type="button" class="btn btn-primary mt-6 w-full"
                            @click.prevent="saveFundsAllocation">Save
                            Funds Allocation</button>

                        <div class="pt-12">
                            <table id="tableHover" class="table-hover">
                                <thead>
                                    <tr>
                                        <th>Name Allocation</th>
                                        <th>Percentage</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <template x-for="(item, index) in funds_collection" :key="index">
                                        <tr>
                                            <td x-text="item.name"></td>
                                            <td x-text="item.percentage"></td>
                                            <td>
                                                <div class="flex items-center gap-2">
                                                    <button @click="editFundsCollection(index)" type="button"
                                                        class="hover:text-danger">
                                                        <svg x-tooltip="Edit" data-theme="info" data-delay='500'
                                                            width="20" height="20" viewBox="0 0 24 24"
                                                            fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path
                                                                d="M11.4001 18.1612L11.4001 18.1612L18.796 10.7653C17.7894 10.3464 16.5972 9.6582 15.4697 8.53068C14.342 7.40298 13.6537 6.21058 13.2348 5.2039L5.83882 12.5999L5.83879 12.5999C5.26166 13.1771 4.97307 13.4657 4.7249 13.7838C4.43213 14.1592 4.18114 14.5653 3.97634 14.995C3.80273 15.3593 3.67368 15.7465 3.41556 16.5208L2.05445 20.6042C1.92743 20.9852 2.0266 21.4053 2.31063 21.6894C2.59466 21.9734 3.01478 22.0726 3.39584 21.9456L7.47918 20.5844C8.25351 20.3263 8.6407 20.1973 9.00498 20.0237C9.43469 19.8189 9.84082 19.5679 10.2162 19.2751C10.5343 19.0269 10.823 18.7383 11.4001 18.1612Z"
                                                                fill="currentColor"></path>
                                                            <path
                                                                d="M20.8482 8.71306C22.3839 7.17735 22.3839 4.68748 20.8482 3.15178C19.3125 1.61607 16.8226 1.61607 15.2869 3.15178L14.3999 4.03882C14.4121 4.0755 14.4246 4.11268 14.4377 4.15035C14.7628 5.0875 15.3763 6.31601 16.5303 7.47002C17.6843 8.62403 18.9128 9.23749 19.85 9.56262C19.8875 9.57563 19.9245 9.58817 19.961 9.60026L20.8482 8.71306Z"
                                                                fill="currentColor"></path>
                                                        </svg>
                                                    </button>
                                                    <button @click="removeFundsCollection(index)" type="button"
                                                        class="hover:text-danger"><svg x-tooltip="Delete"
                                                            data-theme="danger" data-delay='500' width="20"
                                                            height="20" viewBox="0 0 24 24" fill="none"
                                                            xmlns="http://www.w3.org/2000/svg">
                                                            <path opacity="0.5"
                                                                d="M11.5956 22.0001H12.4044C15.1871 22.0001 16.5785 22.0001 17.4831 21.1142C18.3878 20.2283 18.4803 18.7751 18.6654 15.8686L18.9321 11.6807C19.0326 10.1037 19.0828 9.31524 18.6289 8.81558C18.1751 8.31592 17.4087 8.31592 15.876 8.31592H8.12405C6.59127 8.31592 5.82488 8.31592 5.37105 8.81558C4.91722 9.31524 4.96744 10.1037 5.06788 11.6807L5.33459 15.8686C5.5197 18.7751 5.61225 20.2283 6.51689 21.1142C7.42153 22.0001 8.81289 22.0001 11.5956 22.0001Z"
                                                                fill="currentColor"></path>
                                                            <path
                                                                d="M3 6.38597C3 5.90152 3.34538 5.50879 3.77143 5.50879L6.43567 5.50832C6.96502 5.49306 7.43202 5.11033 7.61214 4.54412C7.61688 4.52923 7.62232 4.51087 7.64185 4.44424L7.75665 4.05256C7.8269 3.81241 7.8881 3.60318 7.97375 3.41617C8.31209 2.67736 8.93808 2.16432 9.66147 2.03297C9.84457 1.99972 10.0385 1.99986 10.2611 2.00002H13.7391C13.9617 1.99986 14.1556 1.99972 14.3387 2.03297C15.0621 2.16432 15.6881 2.67736 16.0264 3.41617C16.1121 3.60318 16.1733 3.81241 16.2435 4.05256L16.3583 4.44424C16.3778 4.51087 16.3833 4.52923 16.388 4.54412C16.5682 5.11033 17.1278 5.49353 17.6571 5.50879H20.2286C20.6546 5.50879 21 5.90152 21 6.38597C21 6.87043 20.6546 7.26316 20.2286 7.26316H3.77143C3.34538 7.26316 3 6.87043 3 6.38597Z"
                                                                fill="currentColor"></path>
                                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                                d="M9.42543 11.4815C9.83759 11.4381 10.2051 11.7547 10.2463 12.1885L10.7463 17.4517C10.7875 17.8855 10.4868 18.2724 10.0747 18.3158C9.66253 18.3592 9.29499 18.0426 9.25378 17.6088L8.75378 12.3456C8.71256 11.9118 9.01327 11.5249 9.42543 11.4815Z"
                                                                fill="currentColor"></path>
                                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                                d="M14.5747 11.4815C14.9868 11.5249 15.2875 11.9118 15.2463 12.3456L14.7463 17.6088C14.7051 18.0426 14.3376 18.3592 13.9254 18.3158C13.5133 18.2724 13.2126 17.8855 13.2538 17.4517L13.7538 12.1885C13.795 11.7547 14.1625 11.4381 14.5747 11.4815Z"
                                                                fill="currentColor"></path>
                                                        </svg></button>
                                                </div>
                                            </td>
                                        </tr>
                                    </template>
                                </tbody>
                            </table>
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
                funds_collection: @json($funds->fundsAllocation),
                fundsAllocation: {
                    name: '',
                    percentage: '',
                },

                editIndex: null, // Tambahkan untuk melacak indeks yang sedang diedit

                saveFundsAllocation() {
                    if (this.fundsAllocation.name && this.fundsAllocation.percentage) {
                        if (this.editIndex === null) {
                            this.funds_collection.push({
                                ...this.fundsAllocation
                            });
                        } else {
                            // Edit funds yang sudah ada
                            this.funds_collection[this.editIndex] = {
                                ...this.fundsAllocation
                            };
                            this.editIndex = null; // Reset editIndex setelah mengedit
                        }
                    }
                    this.resetFundCollection(); // Reset form funds
                },

                editFundsCollection(index) {
                    // Isi form dengan data funds yang akan diedit
                    this.fundsAllocation = {
                        ...this.funds_collection[index]
                    };
                    this.editIndex = index;
                },

                removeFundsCollection(index) {
                    this.funds_collection.splice(index, 1);
                },

                resetFundCollection() {
                    this.fundsAllocation = {
                        name: '',
                        percentage: '',
                    };
                },

                form4: {
                    name: '{{ $funds->project->name }}',
                    project_id: '{{ $funds->project->id }}',
                    funds_collected: '{{ $funds->funds_collected }}',
                    total_investor: '{{ $funds->total_investor }}',

                },
                validated: {
                    name: '',
                    project_id: '{{ $funds->project->id }}',
                    funds_collected: '',
                    total_investor: '',

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
                    const url = "{{ route('funds.update', $funds->id) }}";

                    const formData = new FormData();
                    formData.append('_token', csrfToken);
                    formData.append('_method', 'PUT');

                    formData.append('project_id', this.form4.project_id);
                    formData.append('funds_collected', this.form4.funds_collected);
                    formData.append('total_investor', this.form4.total_investor);

                    this.funds_collection.forEach((fundsAllocation, index) => {
                        formData.append(`fundsAllocation[${index}][id]`, fundsAllocation.id ||
                            ''); // Send ID if exists
                        formData.append(`fundsAllocation[${index}][name]`, fundsAllocation.name);
                        formData.append(`fundsAllocation[${index}][percentage]`, fundsAllocation.percentage);
                    });

                    fetch(url, {
                            method: 'POST',
                            body: formData
                        })
                        .then(response => {
                            if (response.ok) {
                                this.showMessage('Data berhasil terkirim', 'success');
                                window.location.href = "{{ route('funds.index') }}";
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
