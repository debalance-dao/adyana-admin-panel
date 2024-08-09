<x-layout.default>
    <div x-data="striped" class="panel">
        <div class="flex justify-between ">
            <div class="mb-5 text-lg font-bold dark:text-white-light">Funds</div>
            <div class="mb-5">
                <a href="{{ route('funds.create') }}"><button type="button"
                        class="btn btn-primary w-full">Add</button></a>
            </div>
        </div>

        <table id="tableHover" class="table-hover dark:text-white-dark"></table>
    </div>

    <script>
        document.addEventListener("alpine:init", () => {
            Alpine.data("striped", () => ({
                funds: @json($funds->toArray()),
                dataTable: null,
                init() {
                    const editfundsRoute = "{{ route('funds.edit', ['fund' => ':id']) }}";
                    const tableOptions = {
                        data: {
                            headings: ["No", "Name Project", "Funds Collected *Ady",
                                "Total Investor", "Action"
                            ],
                            data: this.funds.map((funds, index) => {
                                const editUrl = editfundsRoute.replace(':id', funds.id);
                                return [
                                    index + 1,
                                    funds.project.name,
                                    funds.funds_collected,
                                    funds.total_investor,
                                    `<div class="flex items-center gap-2"><a href="${editUrl}" class="hover:text-info"><svg x-tooltip="Edit" data-theme="info" data-delay='500' width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M11.4001 18.1612L11.4001 18.1612L18.796 10.7653C17.7894 10.3464 16.5972 9.6582 15.4697 8.53068C14.342 7.40298 13.6537 6.21058 13.2348 5.2039L5.83882 12.5999L5.83879 12.5999C5.26166 13.1771 4.97307 13.4657 4.7249 13.7838C4.43213 14.1592 4.18114 14.5653 3.97634 14.995C3.80273 15.3593 3.67368 15.7465 3.41556 16.5208L2.05445 20.6042C1.92743 20.9852 2.0266 21.4053 2.31063 21.6894C2.59466 21.9734 3.01478 22.0726 3.39584 21.9456L7.47918 20.5844C8.25351 20.3263 8.6407 20.1973 9.00498 20.0237C9.43469 19.8189 9.84082 19.5679 10.2162 19.2751C10.5343 19.0269 10.823 18.7383 11.4001 18.1612Z" fill="currentColor"></path>
                                        <path d="M20.8482 8.71306C22.3839 7.17735 22.3839 4.68748 20.8482 3.15178C19.3125 1.61607 16.8226 1.61607 15.2869 3.15178L14.3999 4.03882C14.4121 4.0755 14.4246 4.11268 14.4377 4.15035C14.7628 5.0875 15.3763 6.31601 16.5303 7.47002C17.6843 8.62403 18.9128 9.23749 19.85 9.56262C19.8875 9.57563 19.9245 9.58817 19.961 9.60026L20.8482 8.71306Z" fill="currentColor"></path>
                                    </svg></a>
                                    <button @click.prevent="confirmAndDelete(${funds.id})" type="button" class="hover:text-danger"><svg x-tooltip="Delete" data-theme="danger" data-delay='500' width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path opacity="0.5" d="M11.5956 22.0001H12.4044C15.1871 22.0001 16.5785 22.0001 17.4831 21.1142C18.3878 20.2283 18.4803 18.7751 18.6654 15.8686L18.9321 11.6807C19.0326 10.1037 19.0828 9.31524 18.6289 8.81558C18.1751 8.31592 17.4087 8.31592 15.876 8.31592H8.12405C6.59127 8.31592 5.82488 8.31592 5.37105 8.81558C4.91722 9.31524 4.96744 10.1037 5.06788 11.6807L5.33459 15.8686C5.5197 18.7751 5.61225 20.2283 6.51689 21.1142C7.42153 22.0001 8.81289 22.0001 11.5956 22.0001Z" fill="currentColor"></path>
                                    <path d="M3 6.38597C3 5.90152 3.34538 5.50879 3.77143 5.50879L6.43567 5.50832C6.96502 5.49306 7.43202 5.11033 7.61214 4.54412C7.61688 4.52923 7.62232 4.51087 7.64185 4.44424L7.75665 4.05256C7.8269 3.81241 7.8881 3.60318 7.97375 3.41617C8.31209 2.67736 8.93808 2.16432 9.66147 2.03297C9.84457 1.99972 10.0385 1.99986 10.2611 2.00002H13.7391C13.9617 1.99986 14.1556 1.99972 14.3387 2.03297C15.0621 2.16432 15.6881 2.67736 16.0264 3.41617C16.1121 3.60318 16.1733 3.81241 16.2435 4.05256L16.3583 4.44424C16.3778 4.51087 16.3833 4.52923 16.388 4.54412C16.5682 5.11033 17.1278 5.49353 17.6571 5.50879H20.2286C20.6546 5.50879 21 5.90152 21 6.38597C21 6.87043 20.6546 7.26316 20.2286 7.26316H3.77143C3.34538 7.26316 3 6.87043 3 6.38597Z" fill="currentColor"></path>
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M9.42543 11.4815C9.83759 11.4381 10.2051 11.7547 10.2463 12.1885L10.7463 17.4517C10.7875 17.8855 10.4868 18.2724 10.0747 18.3158C9.66253 18.3592 9.29499 18.0426 9.25378 17.6088L8.75378 12.3456C8.71256 11.9118 9.01327 11.5249 9.42543 11.4815Z" fill="currentColor"></path>
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M14.5747 11.4815C14.9868 11.5249 15.2875 11.9118 15.2463 12.3456L14.7463 17.6088C14.7051 18.0426 14.3376 18.3592 13.9254 18.3158C13.5133 18.2724 13.2126 17.8855 13.2538 17.4517L13.7538 12.1885C13.795 11.7547 14.1625 11.4381 14.5747 11.4815Z" fill="currentColor"></path>
                                </svg></button></div>`
                                ];
                            })
                        },
                        sortable: false,
                        searchable: true,
                        perPage: 10,
                        perPageSelect: [10, 20, 30, 50, 100],
                        firstLast: true,
                        firstText: '<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-4.5 h-4.5 rtl:rotate-180"> <path d="M13 19L7 12L13 5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/> <path opacity="0.5" d="M16.9998 19L10.9998 12L16.9998 5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/> </svg>',
                        lastText: '<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-4.5 h-4.5 rtl:rotate-180"> <path d="M11 19L17 12L11 5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/> <path opacity="0.5" d="M6.99976 19L12.9998 12L6.99976 5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/> </svg>',
                        prevText: '<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-4.5 h-4.5 rtl:rotate-180"> <path d="M15 5L9 12L15 19" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/> </svg>',
                        nextText: '<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-4.5 h-4.5 rtl:rotate-180"> <path d="M9 5L15 12L9 19" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/> </svg>',
                        labels: {
                            perPage: "{select}"
                        },
                        layout: {
                            top: "{search}",
                            bottom: "{info}{select}{pager}",
                        },
                    };
                    this.dataTable = new simpleDatatables.DataTable('#tableHover', tableOptions);
                },
                async showConfirmationDialog() {
                    const swalWithBootstrapButtons = window.Swal.mixin({
                        customClass: {
                            popup: 'sweet-alerts',
                            confirmButton: 'btn btn-secondary',
                            cancelButton: 'btn btn-dark ltr:mr-3 rtl:ml-3',
                        },
                        buttonsStyling: false,
                    });

                    const result = await swalWithBootstrapButtons.fire({
                        title: 'Are you sure?',
                        text: "Data cannot be restore!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonText: 'Yes, Delete!',
                        cancelButtonText: 'No, Dont delete!',
                        reverseButtons: true,
                        padding: '2em',
                    });

                    return result.isConfirmed;
                },

                async confirmAndDelete(fundsId) {
                    const isConfirmed = await this.showConfirmationDialog();

                    if (isConfirmed) {
                        this.deleteIngredient(fundsId);
                    }
                },

                async deleteIngredient(fundsId) {
                    const csrfToken = document.querySelector('meta[name="csrf-token"]')
                        .getAttribute('content');
                    const rute = "{{ route('funds.destroy', ':id') }}";
                    const url = rute.replace(':id', fundsId);
                    try {
                        const response = await fetch(url, {
                            method: 'DELETE',
                            headers: {
                                'Content-Type': 'application/json',
                                'X-CSRF-TOKEN': csrfToken
                            },
                        });

                        if (response.ok) {
                            showMessage('Data berhasil dihapus', 'success');
                            const data = await response.json();
                            this.removefundsFromList(fundsId);
                        } else {
                            const data = await response.json();
                            if (response.status === 422) {
                                showMessage(data.error, 'error');
                            } else {
                                showMessage('Gagal menghapus data', 'error');
                            }
                        }
                    } catch (error) {
                        showMessage('Terjadi kesalahan: ' + error.message, 'error');
                    }
                },

                removefundsFromList(fundsId) {
                    const index = this.funds.findIndex(data => data.id === fundsId);
                    if (index !== -1) {
                        this.funds.splice(index, 1);
                        if (this.dataTable) {
                            this.dataTable.destroy();
                            this.init();
                        }
                    }
                },
            }));
            //message with toastr
            @if (session()->has('success'))
                showMessage('{{ session('success') }}', 'success');
            @elseif (session()->has('error'))
                showMessage('{{ session('error') }}', 'error')
            @endif

            function showMessage(msg = '', type = 'success') {
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
            }
        });
    </script>
</x-layout.default>
