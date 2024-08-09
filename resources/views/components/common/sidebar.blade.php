<div :class="{ 'dark text-white-dark': $store.app.semidark }">
    <nav x-data="sidebar"
        class="sidebar fixed min-h-screen h-full top-0 bottom-0 w-[260px] shadow-[5px_0_25px_0_rgba(94,92,154,0.1)] z-50 transition-all duration-300">
        <div class="bg-white h-full dark:bg-[#0e1726] dark:text-white-light">
            <div class="flex justify-between items-center px-4 py-3">
                <a href="/home" class="main-logo flex items-center shrink-0">
                    <span class="text-2xl ltr:ml-1.5 rtl:mr-1.5  font-semibold  align-middle lg:inline">Adyana</span>
                </a>
                <a href="javascript:;"
                    class="collapse-icon w-8 h-8 rounded-full flex items-center hover:bg-gray-500/10 transition duration-300 rtl:rotate-180"
                    @click="$store.app.toggleSidebar()">
                    <svg class="w-5 h-5 m-auto" width="20" height="20" viewBox="0 0 24 24" fill="white"
                        xmlns="http://www.w3.org/2000/svg">
                        <path d="M13 19L7 12L13 5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                            stroke-linejoin="round" />
                        <path opacity="0.5" d="M16.9998 19L10.9998 12L16.9998 5" stroke="currentColor"
                            stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                </a>
            </div>
            <ul class="perfect-scrollbar relative font-semibold space-y-0.5 h-[calc(100vh-80px)] overflow-y-auto overflow-x-hidden  p-4 py-0"
                x-data="{ activeDropdown: null }">
                <li class="nav-item">
                    <a href="/home" class="group">
                        <div class="flex items-center">

                            <svg width="24" height="24" viewBox="0 0 24 24" fill="white"
                                xmlns="http://www.w3.org/2000/svg">
                                <path opacity="0.5"
                                    d="M13.5 15.5C13.5 13.6144 13.5 12.6716 14.0858 12.0858C14.6716 11.5 15.6144 11.5 17.5 11.5C19.3856 11.5 20.3284 11.5 20.9142 12.0858C21.5 12.6716 21.5 13.6144 21.5 15.5V17.5C21.5 19.3856 21.5 20.3284 20.9142 20.9142C20.3284 21.5 19.3856 21.5 17.5 21.5C15.6144 21.5 14.6716 21.5 14.0858 20.9142C13.5 20.3284 13.5 19.3856 13.5 17.5V15.5Z"
                                    stroke="#1C274C" stroke-width="1.5" />
                                <path
                                    d="M2 8.5C2 10.3856 2 11.3284 2.58579 11.9142C3.17157 12.5 4.11438 12.5 6 12.5C7.88562 12.5 8.82843 12.5 9.41421 11.9142C10 11.3284 10 10.3856 10 8.5V6.5C10 4.61438 10 3.67157 9.41421 3.08579C8.82843 2.5 7.88562 2.5 6 2.5C4.11438 2.5 3.17157 2.5 2.58579 3.08579C2 3.67157 2 4.61438 2 6.5V8.5Z"
                                    stroke="#1C274C" stroke-width="1.5" />
                                <path
                                    d="M13.5 5.5C13.5 4.56812 13.5 4.10218 13.6522 3.73463C13.8552 3.24458 14.2446 2.85523 14.7346 2.65224C15.1022 2.5 15.5681 2.5 16.5 2.5H18.5C19.4319 2.5 19.8978 2.5 20.2654 2.65224C20.7554 2.85523 21.1448 3.24458 21.3478 3.73463C21.5 4.10218 21.5 4.56812 21.5 5.5C21.5 6.43188 21.5 6.89782 21.3478 7.26537C21.1448 7.75542 20.7554 8.14477 20.2654 8.34776C19.8978 8.5 19.4319 8.5 18.5 8.5H16.5C15.5681 8.5 15.1022 8.5 14.7346 8.34776C14.2446 8.14477 13.8552 7.75542 13.6522 7.26537C13.5 6.89782 13.5 6.43188 13.5 5.5Z"
                                    stroke="#1C274C" stroke-width="1.5" />
                                <path opacity="0.5"
                                    d="M2 18.5C2 19.4319 2 19.8978 2.15224 20.2654C2.35523 20.7554 2.74458 21.1448 3.23463 21.3478C3.60218 21.5 4.06812 21.5 5 21.5H7C7.93188 21.5 8.39782 21.5 8.76537 21.3478C9.25542 21.1448 9.64477 20.7554 9.84776 20.2654C10 19.8978 10 19.4319 10 18.5C10 17.5681 10 17.1022 9.84776 16.7346C9.64477 16.2446 9.25542 15.8552 8.76537 15.6522C8.39782 15.5 7.93188 15.5 7 15.5H5C4.06812 15.5 3.60218 15.5 3.23463 15.6522C2.74458 15.8552 2.35523 16.2446 2.15224 16.7346C2 17.1022 2 17.5681 2 18.5Z"
                                    stroke="#1C274C" stroke-width="1.5" />
                            </svg>


                            <span
                                class="ltr:pl-3 rtl:pr-3 text-black dark:text-[#506690] dark:group-hover:text-white-dark">Dashboard</span>
                        </div>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="/projects" class="group">
                        <div class="flex items-center">

                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M17 22V16C17 14.1144 17 13.1716 16.4142 12.5858C15.8284 12 14.8856 12 13 12H11C9.11438 12 8.17157 12 7.58579 12.5858C7 13.1716 7 14.1144 7 16V22"
                                    stroke="white" stroke-width="1.5" />
                                <path opacity="0.5"
                                    d="M21 21.9999V7.77195C21 6.4311 21 5.76068 20.6439 5.24676C20.2877 4.73283 19.66 4.49743 18.4045 4.02663C15.9492 3.10591 14.7216 2.64555 13.8608 3.2421C13 3.83864 13 5.14974 13 7.77195V11.9999"
                                    stroke="white" stroke-width="1.5" />
                                <path opacity="0.5"
                                    d="M3.25 8C3.25 8.41421 3.58579 8.75 4 8.75C4.41421 8.75 4.75 8.41421 4.75 8H3.25ZM9.25 8C9.25 8.41421 9.58579 8.75 10 8.75C10.4142 8.75 10.75 8.41421 10.75 8H9.25ZM9.70711 4.79289L9.17678 5.32322L9.17678 5.32322L9.70711 4.79289ZM6.25 4C6.25 4.41421 6.58579 4.75 7 4.75C7.41421 4.75 7.75 4.41421 7.75 4H6.25ZM7.75 2C7.75 1.58579 7.41421 1.25 7 1.25C6.58579 1.25 6.25 1.58579 6.25 2H7.75ZM3.75 22V12H2.25V22H3.75ZM7 8.75C7.96401 8.75 8.61157 8.75159 9.09461 8.81654C9.55607 8.87858 9.75357 8.9858 9.88388 9.11612L10.9445 8.05546C10.4891 7.59999 9.92227 7.41432 9.29448 7.32991C8.68826 7.24841 7.92161 7.25 7 7.25V8.75ZM11.75 12C11.75 11.0784 11.7516 10.3117 11.6701 9.70552C11.5857 9.07773 11.4 8.51093 10.9445 8.05546L9.88388 9.11612C10.0142 9.24643 10.1214 9.44393 10.1835 9.90539C10.2484 10.3884 10.25 11.036 10.25 12H11.75ZM7 7.25C6.07839 7.25 5.31174 7.24841 4.70552 7.32991C4.07773 7.41432 3.51093 7.59999 3.05546 8.05546L4.11612 9.11612C4.24643 8.9858 4.44393 8.87858 4.90539 8.81654C5.38843 8.75159 6.03599 8.75 7 8.75V7.25ZM3.75 12C3.75 11.036 3.75159 10.3884 3.81654 9.90539C3.87858 9.44393 3.9858 9.24643 4.11612 9.11612L3.05546 8.05546C2.59999 8.51093 2.41432 9.07773 2.32991 9.70552C2.24841 10.3117 2.25 11.0784 2.25 12H3.75ZM4.75 8V6.5H3.25V8H4.75ZM6 5.25H8V3.75H6V5.25ZM9.25 6.5V8H10.75V6.5H9.25ZM8 5.25C8.49261 5.25 8.78661 5.25159 8.99734 5.27992C9.09389 5.29291 9.14226 5.3082 9.16404 5.31716C9.16908 5.31923 9.1724 5.32085 9.17433 5.32186C9.17624 5.32286 9.17708 5.32341 9.17717 5.32347C9.17723 5.32351 9.177 5.32335 9.17665 5.32307C9.1763 5.32279 9.17632 5.32277 9.17678 5.32322L10.2374 4.26256C9.92841 3.95354 9.55269 3.84109 9.19721 3.7933C8.8633 3.74841 8.4502 3.75 8 3.75V5.25ZM10.75 6.5C10.75 6.0498 10.7516 5.6367 10.7067 5.30279C10.6589 4.94731 10.5465 4.57159 10.2374 4.26256L9.17678 5.32322C9.17723 5.32368 9.17721 5.3237 9.17693 5.32335C9.17665 5.323 9.17649 5.32277 9.17653 5.32283C9.17659 5.32292 9.17714 5.32376 9.17814 5.32567C9.17915 5.3276 9.18077 5.33092 9.18284 5.33596C9.1918 5.35774 9.20709 5.40611 9.22008 5.50266C9.24841 5.71339 9.25 6.00739 9.25 6.5H10.75ZM4.75 6.5C4.75 6.00739 4.75159 5.71339 4.77992 5.50266C4.79291 5.40611 4.8082 5.35774 4.81716 5.33596C4.81923 5.33092 4.82085 5.3276 4.82186 5.32567C4.82286 5.32376 4.82341 5.32292 4.82347 5.32283C4.82351 5.32277 4.82335 5.323 4.82307 5.32335C4.82279 5.3237 4.82277 5.32368 4.82322 5.32322L3.76256 4.26256C3.45354 4.57159 3.34109 4.94731 3.2933 5.30279C3.24841 5.6367 3.25 6.0498 3.25 6.5H4.75ZM6 3.75C5.5498 3.75 5.1367 3.74841 4.80279 3.7933C4.44731 3.84109 4.07159 3.95354 3.76256 4.26256L4.82322 5.32322C4.82368 5.32277 4.8237 5.32279 4.82335 5.32307C4.823 5.32335 4.82277 5.32351 4.82283 5.32347C4.82292 5.32341 4.82376 5.32286 4.82567 5.32186C4.8276 5.32085 4.83092 5.31923 4.83596 5.31716C4.85774 5.3082 4.90611 5.29291 5.00266 5.27992C5.21339 5.25159 5.50739 5.25 6 5.25V3.75ZM7.75 4V2H6.25V4H7.75Z"
                                    fill="white" />
                                <path d="M22 22L2 22" stroke="white" stroke-width="1.5" stroke-linecap="round" />
                                <path opacity="0.5" d="M10 15H14" stroke="white" stroke-width="1.5"
                                    stroke-linecap="round" />
                                <path opacity="0.5" d="M10 18H14" stroke="white" stroke-width="1.5"
                                    stroke-linecap="round" />
                            </svg>



                            <span
                                class="ltr:pl-3 rtl:pr-3 text-black dark:text-[#506690] dark:group-hover:text-white-dark">Projects</span>
                        </div>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="/home" class="group">
                        <div class="flex items-center">

                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path opacity="0.4"
                                    d="M12 2C17.5228 2 22 6.47715 22 12C22 17.5228 17.5228 22 12 22C6.47715 22 2 17.5228 2 12C2 9.20261 3.14864 6.67349 5 4.85857"
                                    stroke="white" stroke-width="1.5" stroke-linecap="round" />
                                <path opacity="0.7"
                                    d="M5 12C5 15.866 8.13401 19 12 19C15.866 19 19 15.866 19 12C19 8.13401 15.866 5 12 5"
                                    stroke="white" stroke-width="1.5" stroke-linecap="round" />
                                <path d="M12 16C14.2091 16 16 14.2091 16 12C16 9.79086 14.2091 8 12 8" stroke="white"
                                    stroke-width="1.5" stroke-linecap="round" />
                            </svg>



                            <span
                                class="ltr:pl-3 rtl:pr-3 text-black dark:text-[#506690] dark:group-hover:text-white-dark">Funds</span>
                        </div>
                    </a>
                </li>

                <h2
                    class="py-3 px-7 flex items-center uppercase font-extrabold bg-white-light/30 dark:bg-dark dark:bg-opacity-[0.08] -mx-4 mb-1">

                    <svg class="w-4 h-5 flex-none hidden" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5"
                        fill="white" stroke-linecap="round" stroke-linejoin="round">
                        <line x1="5" y1="12" x2="19" y2="12"></line>
                    </svg>
                    <span>Apps</span>
                </h2>

                <li class="nav-item">
                    <a href="/users" class="group">
                        <div class="flex items-center">

                            <svg width="24" height="24" viewBox="0 0 24 24" fill="white"
                                xmlns="http://www.w3.org/2000/svg">
                                <circle cx="12" cy="6" r="4" stroke="#1C274C" stroke-width="1.5" />
                                <path opacity="0.5" d="M18 9C19.6569 9 21 7.88071 21 6.5C21 5.11929 19.6569 4 18 4"
                                    stroke="#1C274C" stroke-width="1.5" stroke-linecap="round" />
                                <path opacity="0.5" d="M6 9C4.34315 9 3 7.88071 3 6.5C3 5.11929 4.34315 4 6 4"
                                    stroke="#1C274C" stroke-width="1.5" stroke-linecap="round" />
                                <ellipse cx="12" cy="17" rx="6" ry="4"
                                    stroke="#1C274C" stroke-width="1.5" />
                                <path opacity="0.5"
                                    d="M20 19C21.7542 18.6153 23 17.6411 23 16.5C23 15.3589 21.7542 14.3847 20 14"
                                    stroke="#1C274C" stroke-width="1.5" stroke-linecap="round" />
                                <path opacity="0.5"
                                    d="M4 19C2.24575 18.6153 1 17.6411 1 16.5C1 15.3589 2.24575 14.3847 4 14"
                                    stroke="#1C274C" stroke-width="1.5" stroke-linecap="round" />
                            </svg>

                            <span
                                class="ltr:pl-3 rtl:pr-3 text-black dark:text-[#506690] dark:group-hover:text-white-dark">Users</span>
                        </div>
                    </a>
                </li>
            </ul>
        </div>
    </nav>
</div>
<script>
    document.addEventListener("alpine:init", () => {
        Alpine.data("sidebar", () => ({
            init() {
                const selector = document.querySelector('.sidebar ul a[href="' + window.location
                    .pathname + '"]');
                if (selector) {
                    selector.classList.add('active');
                    const ul = selector.closest('ul.sub-menu');
                    if (ul) {
                        let ele = ul.closest('li.menu').querySelectorAll('.nav-link');
                        if (ele) {
                            ele = ele[0];
                            setTimeout(() => {
                                ele.click();
                            });
                        }
                    }
                }
            },
        }));
    });
</script>
