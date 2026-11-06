
<script setup lang="ts">
import { ref, computed } from 'vue'
import { Link, usePage } from '@inertiajs/vue3'

const isMobileMenuOpen = ref(false)

const page = usePage()

interface NavLink {
    label: string
    href: string
}

const navLinks: NavLink[] = [
    {
        label: 'হোম',
        href: '/',
    },
    {
        label: 'গল্পের ভাণ্ডার',
        href: '/stories',
    },
    {
        label: 'বিষয়ভিত্তিক গল্প',
        href: '/categories',
    },
    {
        label: 'বয়সভিত্তিক গল্প',
        href: '/age',
    },
    {
        label: 'আমাদের সম্পর্কে',
        href: '/about',
    },
    {
        label: 'যোগাযোগ',
        href: '/contact',
    },
]

const currentUrl = computed(() => page.url)

const isActive = (href: string): boolean => {
    if (href === '/') {
        return currentUrl.value === '/'
    }

    return currentUrl.value === href ||
        currentUrl.value.startsWith(`${href}/`)
}

const closeMobileMenu = () => {
    isMobileMenuOpen.value = false
}
</script>

<template>
    <header
        class="sticky top-0 z-50 border-b border-amber-400/20
               bg-[#102B20]/95 shadow-lg shadow-black/10
               backdrop-blur-md"
    >
        <nav
            class="mx-auto flex max-w-7xl items-center justify-between
                   px-4 py-3 sm:px-6 lg:px-8"
            aria-label="Main Navigation"
        >
            <!-- Logo -->
            <Link
                href="/"
                class="group flex items-center gap-3"
                @click="closeMobileMenu"
            >
                <!-- Islamic Vintage Logo -->
                <div
                    class="flex h-12 w-12 items-center justify-center
                           rounded-xl border border-amber-400/40
                           bg-[#183D2D] shadow-md
                           transition group-hover:border-amber-300"
                >
                    <svg
                        viewBox="0 0 100 100"
                        class="h-9 w-9 text-amber-300"
                        fill="none"
                        xmlns="http://www.w3.org/2000/svg"
                        aria-hidden="true"
                    >
                        <path
                            d="M50 8 L62 27 L82 18 L73 38
                               L92 50 L73 62 L82 82
                               L62 73 L50 92 L38 73
                               L18 82 L27 62 L8 50
                               L27 38 L18 18 L38 27 Z"
                            stroke="currentColor"
                            stroke-width="2"
                        />

                        <path
                            d="M35 35 H65 V65 H35 Z"
                            stroke="currentColor"
                            stroke-width="2"
                        />

                        <path
                            d="M50 35 V65
                               M35 50 H65
                               M35 35 L65 65
                               M65 35 L35 65"
                            stroke="currentColor"
                            stroke-width="1.5"
                        />

                        <circle
                            cx="50"
                            cy="50"
                            r="7"
                            fill="currentColor"
                        />
                    </svg>
                </div>

                <div class="flex flex-col">
                    <span
                        class="font-serif text-xl font-bold
                               tracking-wide text-amber-300
                               sm:text-2xl"
                    >
                       নেককারদের গল্প
                    </span>

                    <span
                        class="text-[10px] tracking-[0.18em]
                               text-emerald-100/70 sm:text-xs"
                    >
                        Stories of the Righteous
                    </span>
                </div>
            </Link>

            <!-- Desktop Navigation -->
            <div class="hidden items-center gap-1 lg:flex">
                <Link
                    v-for="item in navLinks"
                    :key="item.href"
                    :href="item.href"
                    class="rounded-lg px-3 py-2 text-sm font-medium
                           transition duration-200"
                    :class="isActive(item.href)
                        ? 'bg-amber-400/10 text-amber-300'
                        : 'text-emerald-50/80 hover:bg-white/5 hover:text-amber-300'"
                >
                    {{ item.label }}
                </Link>
            </div>

            <!-- Authentication Buttons -->
            <div class="hidden items-center gap-3 lg:flex">
                <Link
                    href="/login"
                    class="rounded-lg border border-amber-400/40
                           px-4 py-2 text-sm font-semibold
                           text-amber-300 transition
                           hover:bg-amber-400/10"
                >
                    লগইন
                </Link>

                <Link
                    href="/register"
                    class="rounded-lg bg-amber-400 px-4 py-2
                           text-sm font-bold text-[#102B20]
                           shadow-md transition
                           hover:bg-amber-300"
                >
                    নিবন্ধন
                </Link>
            </div>

            <!-- Mobile Menu Button -->
            <button
                type="button"
                class="inline-flex h-11 w-11 items-center
                       justify-center rounded-lg border
                       border-amber-400/30 text-amber-300
                       transition hover:bg-white/5
                       lg:hidden"
                :aria-expanded="isMobileMenuOpen"
                aria-controls="mobile-navigation"
                aria-label="Toggle navigation menu"
                @click="isMobileMenuOpen = !isMobileMenuOpen"
            >
                <!-- Hamburger Icon -->
                <svg
                    v-if="!isMobileMenuOpen"
                    class="h-6 w-6"
                    fill="none"
                    stroke="currentColor"
                    viewBox="0 0 24 24"
                >
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M4 6h16M4 12h16M4 18h16"
                    />
                </svg>

                <!-- Close Icon -->
                <svg
                    v-else
                    class="h-6 w-6"
                    fill="none"
                    stroke="currentColor"
                    viewBox="0 0 24 24"
                >
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M6 18L18 6M6 6l12 12"
                    />
                </svg>
            </button>
        </nav>

        <!-- Mobile Navigation -->
        <div
            v-if="isMobileMenuOpen"
            id="mobile-navigation"
            class="border-t border-amber-400/20
                   bg-[#102B20] px-4 pb-5 pt-3
                   lg:hidden"
        >
            <div class="flex flex-col gap-1">
                <Link
                    v-for="item in navLinks"
                    :key="item.href"
                    :href="item.href"
                    class="rounded-lg px-4 py-3 text-sm
                           font-medium transition"
                    :class="isActive(item.href)
                        ? 'bg-amber-400/10 text-amber-300'
                        : 'text-emerald-50/80 hover:bg-white/5 hover:text-amber-300'"
                    @click="closeMobileMenu"
                >
                    {{ item.label }}
                </Link>
            </div>

            <!-- Mobile Authentication -->
            <div class="mt-4 grid grid-cols-2 gap-3">
                <Link
                    href="/login"
                    class="rounded-lg border
                           border-amber-400/40 px-4 py-3
                           text-center text-sm font-semibold
                           text-amber-300 transition
                           hover:bg-amber-400/10"
                    @click="closeMobileMenu"
                >
                    লগইন
                </Link>

                <Link
                    href="/register"
                    class="rounded-lg bg-amber-400 px-4 py-3
                           text-center text-sm font-bold
                           text-[#102B20] transition
                           hover:bg-amber-300"
                    @click="closeMobileMenu"
                >
                    নিবন্ধন
                </Link>
            </div>
        </div>
    </header>
</template>
