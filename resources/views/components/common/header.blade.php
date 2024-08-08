<header class="z-40" :class="{ 'dark': $store.app.semidark && $store.app.menu === 'horizontal' }">
    <div class="shadow-sm">
        <div class="relative bg-white flex w-full items-center px-5 py-2.5 dark:bg-[#0e1726]">
            <div
                class="horizontal-logo flex lg:hidden justify-between items-center ltr:mr-2 rtl:ml-2 dark:text-white-light">
                <a href="/home" class="main-logo flex items-center shrink-0">
                    <span
                        class="text-2xl ltr:ml-1.5 rtl:mr-1.5  font-semibold  align-middle hidden md:inline transition-all duration-300">Adyana</span>
                </a>

                <a href="javascript:;"
                    class="collapse-icon flex-none hover:text-primary flex lg:hidden ltr:ml-2 rtl:mr-2 p-2 rounded-full bg-white-light/40 hover:bg-white-light/90 dark:bg-dark/40"
                    @click="$store.app.toggleSidebar()">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path d="M20 7L4 7" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                        <path opacity="0.5" d="M20 12L4 12" stroke="currentColor" stroke-width="1.5"
                            stroke-linecap="round" />
                        <path d="M20 17L4 17" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                    </svg>
                </a>
            </div>
            <div
                class="sm:flex-1 ltr:sm:ml-0 ltr:ml-auto sm:rtl:mr-0 rtl:mr-auto flex items-center space-x-1.5 lg:space-x-2 rtl:space-x-reverse">

                {{-- profile --}}
                <div class="dropdown flex-grow flex justify-end" x-data="dropdown" @click.outside="open = false">
                    <a href="javascript:;"
                        class="block p-2 rounded-full bg-white-light/40 dark:bg-dark/40 hover:text-primary hover:bg-white-light/90 dark:hover:bg-dark/60"
                        @click="toggle">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="null"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M18.3569 1.36424C18.57 1.00906 19.0307 0.893883 19.3859 1.10699L19 1.75011C19.3859 1.10699 19.3859 1.10699 19.3859 1.10699L19.3873 1.10783L19.3888 1.10878L19.3925 1.11103L19.4021 1.11695C19.4095 1.12153 19.4187 1.12737 19.4297 1.13448C19.4517 1.14871 19.4808 1.16809 19.516 1.19272C19.5863 1.24194 19.6813 1.31244 19.7926 1.4052C20.0147 1.59029 20.3052 1.86678 20.5945 2.24283C21.1773 3.00057 21.75 4.15746 21.75 5.75011C21.75 7.34277 21.1773 8.49966 20.5945 9.2574C20.3052 9.63345 20.0147 9.90994 19.7926 10.095C19.6813 10.1878 19.5863 10.2583 19.516 10.3075C19.4808 10.3321 19.4517 10.3515 19.4297 10.3657C19.4242 10.3693 19.4192 10.3725 19.4146 10.3754C19.41 10.3784 19.4058 10.381 19.4021 10.3833L19.3925 10.3892L19.3888 10.3914L19.3873 10.3924C19.3873 10.3924 19.3859 10.3932 19 9.75011L19.3859 10.3932C19.0307 10.6063 18.57 10.4912 18.3569 10.136C18.1447 9.7823 18.258 9.32398 18.6097 9.1097L18.6152 9.10616C18.6225 9.10145 18.6363 9.09231 18.6558 9.07866C18.6949 9.05132 18.7562 9.00619 18.8324 8.9427C18.9853 8.81529 19.1948 8.61678 19.4055 8.34283C19.8227 7.80057 20.25 6.95746 20.25 5.75011C20.25 4.54277 19.8227 3.69966 19.4055 3.1574C19.1948 2.88345 18.9853 2.68494 18.8324 2.55753C18.7562 2.49403 18.6949 2.44891 18.6558 2.42157C18.6363 2.40792 18.6225 2.39878 18.6152 2.39406L18.6097 2.39053C18.258 2.17625 18.1447 1.71793 18.3569 1.36424Z"
                                fill="white" />
                            <path
                                d="M10 9.75011C12.2091 9.75011 14 7.95925 14 5.75011C14 3.54097 12.2091 1.75011 10 1.75011C7.79086 1.75011 6 3.54097 6 5.75011C6 7.95925 7.79086 9.75011 10 9.75011Z"
                                fill="white" />
                            <path
                                d="M17.3859 3.10699C17.0307 2.89388 16.57 3.00906 16.3569 3.36424L16.6051 4.38774L16.6129 4.39305C16.6246 4.40125 16.6468 4.41747 16.6761 4.4419C16.7353 4.49119 16.8198 4.57095 16.9055 4.6824C17.0727 4.89966 17.25 5.24277 17.25 5.75011C17.25 6.25746 17.0727 6.60057 16.9055 6.81783C16.8198 6.92928 16.7353 7.00904 16.6761 7.05832C16.6468 7.08276 16.6246 7.09897 16.6129 7.10717L16.6051 7.11249C16.257 7.32794 16.1456 7.78382 16.3569 8.13599C16.57 8.49117 17.0307 8.60634 17.3859 8.39323L17 7.75011C17.3859 8.39323 17.3859 8.39323 17.3859 8.39323L17.3872 8.39243L17.3887 8.39156L17.3918 8.38963L17.3993 8.38504L17.4185 8.37282C17.4332 8.36333 17.4515 8.35108 17.4731 8.33602C17.516 8.30594 17.572 8.26435 17.6364 8.21065C17.7647 8.10369 17.9302 7.94594 18.0945 7.7324C18.4273 7.29966 18.75 6.64277 18.75 5.75011C18.75 4.85746 18.4273 4.20057 18.0945 3.76783C17.9302 3.55428 17.7647 3.39654 17.6364 3.28957C17.572 3.23588 17.516 3.19428 17.4731 3.1642C17.4515 3.14914 17.4332 3.1369 17.4185 3.1274L17.3993 3.11519L17.3918 3.11059L17.3887 3.10867L17.3872 3.1078C17.3872 3.1078 17.3859 3.10699 17 3.75011L17.3859 3.10699Z"
                                fill="gray" />
                            <path opacity="0.5"
                                d="M2 17.25C2 19.7353 2 21.75 10 21.75C18 21.75 18 19.7353 18 17.25C18 14.7647 14.4183 12.75 10 12.75C5.58172 12.75 2 14.7647 2 17.25Z"
                                fill="white" />
                        </svg>
                    </a>
                    <ul x-cloak x-show="open" x-transition x-transition.duration.300ms
                        class="ltr:right-0 rtl:left-0 text-dark dark:text-white-light top-11 !py-0 w-[230px] font-semibold dark:text-white-light/90">
                        <li>
                            <div class="flex items-center px-4 py-4">
                                <div class="ltr:pl-4 rtl:pr-4 truncate">
                                    <h4 class="text-base">{{ Auth::user()->name }}</h4>
                                    <a class="text-black/60  hover:text-primary dark:text-dark-light/60 dark:hover:text-white"
                                        href="javascript:;">{{ Auth::user()->role }}</a>
                                </div>
                            </div>
                        </li>
                        <li>
                            <a href="{{ route('profile.edit') }}" class="dark:hover:text-white" @click="toggle">
                                <svg width="20" height="20" viewBox="0 0 24 24" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <circle cx="12" cy="6" r="4" stroke="white" stroke-width="1.5" />
                                    <ellipse opacity="0.5" cx="12" cy="17" rx="7" ry="4"
                                        stroke="white" stroke-width="1.5" />
                                </svg>


                                Profile</a>
                        </li>

                        <li class="border-t border-white-dark ">
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf

                                <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                    {{ __('Log Out') }}
                                </x-dropdown-link>
                            </form>


                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</header>
