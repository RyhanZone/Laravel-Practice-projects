<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Confirmed</title>

    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="min-h-screen bg-slate-950 text-white flex items-center justify-center px-4 py-12">

    <main class="w-full max-w-2xl">

        <!-- Header -->
        <div class="text-center mb-8">
            <p class="text-sm font-semibold uppercase tracking-[0.3em] text-violet-400">
                Event Registration
            </p>

            <h1 class="mt-3 text-3xl sm:text-4xl font-bold tracking-tight">
                You're on the list!
            </h1>

            <p class="mt-3 text-slate-400">
                Your registration has been received successfully.
            </p>
        </div>

        <!-- Main Card -->
        <div class="overflow-hidden rounded-3xl border border-white/10 bg-slate-900 shadow-2xl shadow-violet-950/20">

            <!-- Success Banner -->
            <div class="bg-gradient-to-r from-violet-600 to-indigo-600 px-6 py-8 text-center sm:px-10">

                <div class="mx-auto flex h-16 w-16 items-center justify-center rounded-full bg-white/15 ring-1 ring-white/30">
                    <svg class="h-9 w-9" fill="none" stroke="currentColor"
                         viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              stroke-width="2.5" d="M5 13l4 4L19 7"/>
                    </svg>
                </div>

                <h2 class="mt-5 text-2xl font-bold">
                    Welcome, {{ $data['full_name'] }}!
                </h2>

                <p class="mt-2 text-sm leading-6 text-violet-100">
                    We're excited to have you join us.
                    We'll notify you when the show is about to begin.
                </p>
            </div>

            <!-- Contact Details -->
            <div class="p-6 sm:p-10">

                <h3 class="text-lg font-semibold">
                    Your Registration Details
                </h3>

                <p class="mt-1 text-sm text-slate-400">
                    Please make sure your contact information is correct.
                </p>

                <div class="mt-6 space-y-4">

                    <!-- Email -->
                    <div class="flex items-start gap-4 rounded-xl border border-white/5 bg-slate-800/70 p-4">
                        <div class="flex h-11 w-11 shrink-0 items-center justify-center rounded-lg bg-violet-500/10 text-violet-400">
                            <svg class="h-5 w-5" fill="none" stroke="currentColor"
                                 viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                      stroke-width="1.8"
                                      d="M3 8l9 6 9-6M5 5h14a2 2 0 012 2v10a2 2 0 01-2 2H5a2 2 0 01-2-2V7a2 2 0 012-2z"/>
                            </svg>
                        </div>

                        <div class="min-w-0">
                            <p class="text-sm text-slate-400">Email Address</p>
                            <p class="mt-1 break-all font-medium">
                                {{ $data['email'] }}
                            </p>
                        </div>
                    </div>

                    <!-- Phone -->
                    <div class="flex items-start gap-4 rounded-xl border border-white/5 bg-slate-800/70 p-4">
                        <div class="flex h-11 w-11 shrink-0 items-center justify-center rounded-lg bg-indigo-500/10 text-indigo-400">
                            <svg class="h-5 w-5" fill="none" stroke="currentColor"
                                 viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                      stroke-width="1.8"
                                      d="M3 5a2 2 0 012-2h3l2 5-2 1.5a12 12 0 005.5 5.5L15 13l5 2v3a2 2 0 01-2 2C9 20 4 15 3 6V5z"/>
                            </svg>
                        </div>

                        <div class="min-w-0">
                            <p class="text-sm text-slate-400">Phone Number</p>
                            <p class="mt-1 font-medium">
                                {{ $data['phone'] }}
                            </p>
                        </div>
                    </div>

                    <!-- Ticket Type -->
                    <div class="flex items-start gap-4 rounded-xl border border-white/5 bg-slate-800/70 p-4">
                        <div class="flex h-11 w-11 shrink-0 items-center justify-center rounded-lg bg-pink-500/10 text-pink-400">
                            <svg class="h-5 w-5" fill="none" stroke="currentColor"
                                 viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                      stroke-width="1.8"
                                      d="M2 9a3 3 0 000 6v3a2 2 0 002 2h16a2 2 0 002-2v-3a3 3 0 010-6V6a2 2 0 00-2-2H4a2 2 0 00-2 2v3zM13 5v2m0 4v2m0 4v2"/>
                            </svg>
                        </div>

                        <div class="min-w-0">
                            <p class="text-sm text-slate-400">Ticket Type</p>
                            <p class="mt-1 font-medium">
                                {{ $data['ticket_type'] }}
                            </p>
                        </div>
                    </div>

                </div>

                <!-- Promo Code -->
                @if (!empty($data['promo_code']))
                    <div class="mt-6 rounded-2xl border border-emerald-400/20 bg-emerald-400/5 p-5 sm:p-6">

                        <div class="flex items-start gap-3">
                            <div class="flex h-11 w-11 shrink-0 items-center justify-center rounded-xl bg-emerald-400/10 text-emerald-400">
                                <svg class="h-6 w-6" fill="none" stroke="currentColor"
                                     viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                          stroke-width="1.8"
                                          d="M20 12l-8 8-9-9V3h8l9 9z"/>
                                    <circle cx="7.5" cy="7.5" r="1"/>
                                </svg>
                            </div>

                            <div>
                                <p class="font-bold text-emerald-400">
                                    Congratulations! 20% OFF
                                </p>

                                <p class="mt-1 text-sm leading-6 text-slate-400">
                                    You've unlocked a special discount with your promo code.
                                </p>
                            </div>
                        </div>

                        <div class="mt-4 flex flex-wrap items-center justify-between gap-3 rounded-xl border border-dashed border-emerald-400/30 bg-slate-950/50 p-3">
                            <div>
                                <p class="text-xs uppercase tracking-wider text-slate-500">
                                    Your promo code
                                </p>

                                <p id="promoCode" class="mt-1 break-all font-mono font-bold tracking-wider text-white">
                                    {{ $data['promo_code'] }}
                                </p>
                            </div>

                            <button
                                type="button"
                                onclick="copyPromoCode()"
                                class="rounded-lg bg-emerald-400 px-4 py-2 text-sm font-bold text-slate-950 transition hover:bg-emerald-300">
                                Copy Code
                            </button>
                        </div>
                    </div>
                @endif

                <!-- Footer Action -->
                <div class="mt-8 border-t border-white/10 pt-6 text-center">
                    <p class="text-sm leading-6 text-slate-400">
                        Keep an eye on your inbox and phone.
                        We look forward to seeing you at the show!
                    </p>

                    <a href="{{ url('/') }}"
                       class="mt-6 inline-flex items-center justify-center gap-2 rounded-xl bg-white px-6 py-3 font-semibold text-slate-950 transition hover:bg-violet-100">
                        Back to Home

                        <svg class="h-4 w-4" fill="none" stroke="currentColor"
                             viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  stroke-width="2" d="M5 12h14m-7-7l7 7-7 7"/>
                        </svg>
                    </a>
                </div>

            </div>
        </div>

        <!-- Page Footer -->
        <p class="mt-6 text-center text-xs text-slate-500">
            Thank you for registering. See you at the show!
        </p>

    </main>

    <script>
        function copyPromoCode() {
            const code = document.getElementById('promoCode').textContent.trim();

            navigator.clipboard.writeText(code).then(() => {
                const button = document.querySelector('button[onclick="copyPromoCode()"]');
                button.textContent = 'Copied!';

                setTimeout(() => {
                    button.textContent = 'Copy Code';
                }, 2000);
            }).catch(() => {
                alert('Unable to copy the promo code. Please copy it manually.');
            });
        }
    </script>

</body>
</html>