<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>EventHub — Ticket Booking</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <script>
    tailwind.config = {
      theme: {
        extend: {
          colors: {
            ink: "#101827",
            violetBrand: "#5546F5",
            violetSoft: "#F0EFFF"
          },
          boxShadow: {
            soft: "0 12px 35px rgba(20, 35, 70, .06)"
          }
        }
      }
    };
  </script>
  <style>
    body {
      background:
        radial-gradient(circle at 10% 20%, rgba(224, 231, 255, .5), transparent 28rem),
        #f7f9fd;
    }
    .field {
      width: 100%;
      border: 1px solid #dbe3f0;
      border-radius: .65rem;
      background: #fff;
      padding: .82rem .95rem;
      outline: none;
      transition: border-color .2s, box-shadow .2s;
    }
    .field:focus {
      border-color: #7065ff;
      box-shadow: 0 0 0 3px rgba(85, 70, 245, .12);
    }
    .icon-box {
      display: inline-flex;
      align-items: center;
      justify-content: center;
      width: 2.5rem;
      height: 2.5rem;
      border-radius: .8rem;
      background: #efeeff;
      color: #5546f5;
      flex-shrink: 0;
    }
  </style>
</head>
<body class="min-h-screen text-slate-800 antialiased">

  <main class="mx-auto grid max-w-[1500px] grid-cols-1 gap-6 px-4 py-7 sm:px-6 lg:grid-cols-[minmax(0,3fr)_minmax(0,7fr)] lg:px-10">
    <!-- Event details -->
    <section id="event" class="overflow-hidden rounded-2xl border border-slate-200/80 bg-white p-3 shadow-soft">
      <div class="relative h-56 overflow-hidden rounded-xl bg-gradient-to-br from-indigo-950 via-purple-900 to-slate-950 sm:h-64">
        <img
          src="https://images.unsplash.com/photo-1459749411175-04bf5292ceea?auto=format&fit=crop&w=1200&q=85"
          alt="Crowd enjoying a live music concert"
          class="h-full w-full object-cover"
        />
        <div class="absolute inset-0 bg-gradient-to-t from-black/55 via-transparent to-black/10"></div>
        <span class="absolute left-5 top-5 rounded-full bg-violetBrand px-4 py-2 text-xs font-bold text-white shadow-lg">Music &amp; Entertainment</span>
      </div>

      <div class="p-3 sm:p-5">
        <h1 class="text-2xl font-extrabold tracking-tight text-ink sm:text-3xl">Summer Vibes Music Festival</h1>
        <p class="mt-3 leading-6 text-slate-600">A night full of music, energy and unforgettable moments. Join us for an amazing live music experience.</p>

        <div class="mt-6 space-y-4">
          <div class="flex items-start gap-3">
            <span class="icon-box">▦</span>
            <div><p class="font-bold text-ink">Date</p><p class="mt-1 text-sm text-slate-600">25 October 2026 (Sunday)</p></div>
          </div>
          <div class="flex items-start gap-3">
            <span class="icon-box">◷</span>
            <div><p class="font-bold text-ink">Time</p><p class="mt-1 text-sm text-slate-600">4:00 PM – 11:00 PM</p></div>
          </div>
          <div class="flex items-start gap-3">
            <span class="icon-box">⌖</span>
            <div><p class="font-bold text-ink">Venue</p><p class="mt-1 text-sm text-slate-600">City Arena, Dhaka</p></div>
          </div>
        </div>

        <div class="my-6 border-t border-slate-100"></div>
        <div class="grid grid-cols-3 gap-3 text-center">
          <div><p class="text-xl text-violetBrand">♫</p><p class="mt-1 text-sm font-semibold">Live Music</p><p class="text-xs text-slate-500">Top artists</p></div>
          <div class="border-x border-slate-100"><p class="text-xl text-violetBrand">♜</p><p class="mt-1 text-sm font-semibold">Food &amp; Drinks</p><p class="text-xs text-slate-500">Food stalls</p></div>
          <div><p class="text-xl text-violetBrand">☆</p><p class="mt-1 text-sm font-semibold">Fun Zone</p><p class="text-xs text-slate-500">And more</p></div>
        </div>

        <div class="mt-7 flex items-center gap-3 rounded-xl border border-violet-100 bg-violetSoft p-4">
          <span class="grid h-10 w-10 place-items-center rounded-full bg-white text-xl text-violetBrand">♬</span>
          <div><p class="text-sm font-bold text-violetBrand">Don’t Miss Out!</p><p class="mt-1 text-xs leading-5 text-slate-600">Grab your tickets and be part of an amazing experience.</p></div>
        </div>
      </div>
    </section>

    <!-- Booking form -->
    <section class="rounded-2xl border border-slate-200/80 bg-white p-5 shadow-soft sm:p-6">
      <h2 class="text-2xl font-extrabold tracking-tight text-ink">Book Your Ticket</h2>
      <p class="mt-2 text-sm leading-6 text-slate-600">Fill in the form below to reserve your spot at the event.</p>

      <form action="/submit" method="POST" class="mt-6 space-y-5">
        @csrf
        <div>
          <label for="full_name" class="mb-2 block text-sm font-bold text-ink">Full Name <span class="text-red-500">*</span></label>
          <input id="full_name" name="full_name" type="text" class="field" placeholder="Enter your full name" required />
        </div>
        <div>
          <label for="email" class="mb-2 block text-sm font-bold text-ink">Email Address <span class="text-red-500">*</span></label>
          <input id="email" name="email" type="email" class="field" placeholder="example@domain.com" required />
        </div>
        <div>
          <label for="phone" class="mb-2 block text-sm font-bold text-ink">Phone Number <span class="text-red-500">*</span></label>
          <input id="phone" name="phone" type="tel" class="field" placeholder="01XXXXXXXXX" required />
        </div>

        <div class="border-t border-slate-100 pt-5">
          <label for="ticket_type" class="mb-2 block text-sm font-bold text-ink">Ticket Type <span class="text-red-500">*</span></label>
          <select id="ticket_type" name="ticket_type" class="field" required>
            <option value="Standard">Standard — $25</option>
            <option value="Premium">Premium — $50</option>
            <option value="VIP">VIP — $100</option>
          </select>
        </div>

        <div>
          <label for="promo_code" class="mb-2 block text-sm font-bold text-ink">Promo Code</label>
          <div class="grid grid-cols-1 gap-3 sm:grid-cols-[1fr_auto]">
            <input id="promo_code" name="promo_code" type="text" class="field" placeholder="Enter promo code (optional)" />
            <div class="flex items-center gap-2 rounded-xl bg-violetSoft px-3 py-2 text-xs leading-5 text-violet-800">
              <span class="text-lg">◇</span><span>Use <strong>SAVE20</strong><br />for 20% off!</span>
            </div>
          </div>
        </div>

        <div class="space-y-4">
          <label class="flex cursor-pointer items-start gap-3">
            <input type="checkbox" name="subscribe_newsletter" value="1" class="mt-1 h-5 w-5 rounded border-slate-300 accent-violetBrand" />
            <span><span class="text-sm font-medium text-slate-700">Subscribe to our newsletter</span><span class="mt-1 block text-xs text-slate-500">Get updates about upcoming events and offers.</span></span>
          </label>
          <label class="flex cursor-pointer items-start gap-3">
            <input type="checkbox" name="terms_accepted" value="1" class="mt-1 h-5 w-5 rounded border-slate-300 accent-violetBrand" required />
            <span class="text-sm text-slate-700">I agree to the <a href="#" class="font-semibold text-blue-600 hover:underline">Terms &amp; Conditions</a></span>
          </label>
        </div>

        <button type="submit" class="flex w-full items-center justify-center gap-2 rounded-lg bg-violetBrand px-5 py-3.5 font-bold text-white shadow-lg shadow-violet-200 transition hover:-translate-y-0.5 hover:bg-indigo-600 focus:outline-none focus:ring-4 focus:ring-violet-200">
          <span>♧</span> Confirm Booking
        </button>
        <p class="text-center text-xs text-slate-400">Demo UI only — booking is not submitted to a server yet.</p>
      </form>
    </section>
  </main>
</body>
</html>