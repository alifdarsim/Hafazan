<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Meta tags  -->
    <meta charset="UTF-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0"/>

    <title>Lineone - Sign In v1</title>
    <link rel="icon" type="image/png" href="images/favicon.png"/>

    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/font.css') }}" rel="stylesheet">
    <script src="{{ asset('assets/js/app.js') }}" defer></script>
    @vite(['resources/css/app.css'])
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com"/>
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin/>
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Poppins:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
        rel="stylesheet"/>
    <script>
        /**
         * THIS SCRIPT REQUIRED FOR PREVENT FLICKERING IN SOME BROWSERS
         */
        localStorage.getItem("_x_darkMode_on") === "true" &&
        document.documentElement.classList.add("dark");
    </script>
</head>

<body x-data class="is-header-blur" x-bind="$store.global.documentBody">
<!-- App preloader-->
<div class="fixed z-50 grid h-full w-full place-content-center bg-slate-50 app-preloader dark:bg-navy-900">
    <div class="relative inline-block h-48 w-48 app-preloader-inner"></div>
</div>

<!-- Page Wrapper -->
<div id="root" class="flex grow bg-slate-50 min-h-100vh dark:bg-navy-900" x-cloak>
    <main class="grid w-full grow grid-cols-1 place-items-center">
        <div class="w-full p-4 max-w-[26rem] sm:px-5">
            <div class="text-center">
                <img class="mx-auto h-28 w-28" src="{{ asset('assets/images/quran.svg') }}" alt="logo"/>
                <div class="mt-4">
                    <h2 class="text-4xl font-semibold text-slate-600 dark:text-navy-100">
                        HAFAZAN
                    </h2>
                    <p class="mt-3 text-slate-400 dark:text-navy-300">
                            by Suzen Pax
                        </p>
                </div>
            </div>
            <div class="mt-5 rounded-lg p-5 card lg:p-7">
                <label class="block">
                    <span>Username:</span>
                    <span class="relative flex mt-1.5">
                            <input
                                id="email"
                                value="alifdarsim@gmail.com"
                                class="w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 pl-9 placeholder:text-slate-400/70 form-input peer hover:z-10 hover:border-slate-400 focus:border-primary focus:z-10 dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                                placeholder="Enter Username" type="text"/>
                            <span
                                class="pointer-events-none absolute flex h-full w-10 items-center justify-center text-slate-400 peer-focus:text-primary dark:peer-focus:text-accent dark:text-navy-300">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 transition-colors duration-200"
                                     fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                          d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                                </svg>
                            </span>
                        </span>
                </label>
                <label class="mt-4 block">
                    <span>Password:</span>
                    <span class="relative flex mt-1.5">
                            <input
                                id="password"
                                value="password"
                                class="w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 pl-9 placeholder:text-slate-400/70 form-input peer hover:z-10 hover:border-slate-400 focus:border-primary focus:z-10 dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                                placeholder="Enter Password" type="password"
                            />
                            <span
                                class="pointer-events-none absolute flex h-full w-10 items-center justify-center text-slate-400 peer-focus:text-primary dark:peer-focus:text-accent dark:text-navy-300">
                                <svg xmlns="http://www.w3.org/2000/svg"
                                     class="h-5 w-5 transition-colors duration-200"
                                     fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                          d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                                </svg>
                            </span>
                    </span>
                </label>
                <div class="mt-4 flex items-center justify-between space-x-2">
                    <label class="inline-flex items-center space-x-2">
                        <input
                            class="h-5 w-5 rounded border-slate-400/70 form-checkbox is-basic checked:border-primary checked:bg-primary hover:border-primary focus:border-primary dark:border-navy-400 dark:checked:border-accent dark:checked:bg-accent dark:hover:border-accent dark:focus:border-accent"
                            type="checkbox"/>
                        <span class="line-clamp-1">Remember me</span>
                    </label>
                    <a href="#"
                       class="text-xs text-slate-400 transition-colors line-clamp-1 hover:text-slate-800 focus:text-slate-800 dark:text-navy-300 dark:hover:text-navy-100 dark:focus:text-navy-100">Forgot
                        Password?</a>
                </div>
                <button onclick="login()"
                        class="mt-5 w-full font-medium text-white btn bg-primary hover:bg-primary-focus focus:bg-primary-focus active:bg-primary-focus/90 dark:bg-accent dark:hover:bg-accent-focus dark:focus:bg-accent-focus dark:active:bg-accent/90">
                    Sign In
                </button>
                <div class="mt-4 text-center text-xs+">
                    <p class="line-clamp-1">
                        <span>Dont have Account?</span>
                        <a class="transition-colors text-primary hover:text-primary-focus dark:text-accent-light dark:hover:text-accent"
                           href="{{ route('web.register') }}">Create account
                        </a>
                    </p>
                </div>
            </div>
            <div class="mt-8 flex justify-center text-xs text-slate-400 dark:text-navy-300">
                <a href="#">Privacy Notice</a>
                <div class="mx-3 my-1 w-px bg-slate-200 dark:bg-navy-500"></div>
                <a href="#">Term of service</a>
            </div>
        </div>
    </main>
</div>

<!--
This is a place for Alpine.js Teleport feature
@see https://alpinejs.dev/directives/teleport
-->
<div id="x-teleport-target"></div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script>
    window.addEventListener("DOMContentLoaded", () => Alpine.start());

    function login() {
        let email = document.getElementById('email').value;
        let password = document.getElementById('password').value;

        // check if username and password is empty
        if (email === '' || password === '') {
            alert('Username and Password is required');
            return;
        }

        $.ajax({
            url: "{{ route('api.login') }}",
            type: "POST",
            data: {
                email: email,
                password: password,
                _token: "{{ csrf_token() }}"
            },
            xhrFields: {
                withCredentials: true
            },
            success: function (response) {
                if (response.status === 'success') {
                    // go to dashboard
                    window.location.href = "{{ route('dashboard') }}";
                } else {
                    alert(response.message);
                }
            },
            error: function (response) {
                alert(response.message);
            }
        });
    }
</script>
</body>

</html>
