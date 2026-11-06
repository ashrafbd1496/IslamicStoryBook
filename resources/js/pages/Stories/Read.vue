
<script setup lang="ts">
import { ref, computed, onMounted, onUnmounted } from 'vue'
import { Head, Link } from '@inertiajs/vue3'
import Navbar from '@/components/Shared/Navbar.vue'


interface Story {
    id: number
    title: string
    category: string
    age: string
    icon: string
    premium: boolean
    description: string
    content: string[]
}

const props = defineProps<{
    story: Story
    previousStoryId: number | null
    nextStoryId: number | null
}>()

// Font Size
const fontSize = ref(20)

function increaseFont() {
    fontSize.value = Math.min(fontSize.value + 2, 32)
}

function decreaseFont() {
    fontSize.value = Math.max(fontSize.value - 2, 16)
}

// Reading Progress
const readingProgress = ref(0)

const progressLabel = computed(() => {
    return `${Math.round(readingProgress.value)}%`
})

function updateReadingProgress() {
    const scrollTop = window.scrollY

    const documentHeight =
        document.documentElement.scrollHeight -
        window.innerHeight

    if (documentHeight <= 0) {
        readingProgress.value = 100
        return
    }

    readingProgress.value = Math.min(
        100,
        Math.max(0, (scrollTop / documentHeight) * 100)
    )
}

// Reading Mode
const readingMode = ref(false)

function toggleReadingMode() {
    readingMode.value = !readingMode.value
}

onMounted(() => {
    updateReadingProgress()

    window.addEventListener(
        'scroll',
        updateReadingProgress,
        { passive: true }
    )

    window.addEventListener(
        'resize',
        updateReadingProgress
    )
})

onUnmounted(() => {
    window.removeEventListener(
        'scroll',
        updateReadingProgress
    )

    window.removeEventListener(
        'resize',
        updateReadingProgress
    )
})
</script>

<template>
    <Head :title="`${story.title} | গল্প পড়ুন`" />

    <div
        class="min-h-screen bg-[#0B1F16]
               font-['Hind_Siliguri']
               text-emerald-50"
    >
        <!-- Reading Progress Bar -->
        <div
            class="fixed left-0 top-0 z-50
                   h-1 w-full bg-emerald-950"
        >
            <div
                class="h-full bg-amber-400
                       transition-all duration-150"
                :style="{
                    width: `${readingProgress}%`
                }"
            />
        </div>

        <!-- Navbar -->
        <Navbar />

        <!-- Reading Header -->
        <header
            class="border-b border-amber-400/10
                   bg-gradient-to-b
                   from-[#183D2D] to-[#0B1F16]"
        >
            <div
                class="mx-auto max-w-5xl
                       px-5 py-10
                       sm:px-8"
            >
                <!-- Breadcrumb -->
                <nav
                    class="mb-8 flex flex-wrap
                           items-center gap-2
                           text-sm
                           text-emerald-100/50"
                >
                    <Link
                        href="/"
                        class="hover:text-amber-300"
                    >
                        হোম
                    </Link>

                    <span>/</span>

                    <Link
                        href="/stories"
                        class="hover:text-amber-300"
                    >
                        গল্পের লাইব্রেরি
                    </Link>

                    <span>/</span>

                    <Link
                        :href="`/stories/${story.id}`"
                        class="hover:text-amber-300"
                    >
                        {{ story.title }}
                    </Link>

                    <span>/</span>

                    <span class="text-amber-300">
                        গল্প পড়ুন
                    </span>
                </nav>

                <!-- Title -->
                <div class="text-center">
                    <div class="mb-5 text-5xl">
                        {{ story.icon }}
                    </div>

                    <p
                        class="mb-3 text-sm
                               tracking-widest
                               text-amber-400"
                    >
                        {{ story.category }}
                    </p>

                    <h1
                        class="text-3xl font-bold
                               leading-relaxed
                               text-amber-300
                               sm:text-5xl"
                    >
                        {{ story.title }}
                    </h1>

                    <p
                        class="mt-4 text-sm
                               text-emerald-100/60"
                    >
                        শিশুদের জন্য ইসলামিক গল্প
                        • {{ story.age }}
                    </p>
                </div>
            </div>
        </header>

        <!-- Main Reading Area -->
        <main
            class="mx-auto max-w-5xl
                   px-5 py-10 sm:px-8"
        >
            <!-- Reading Toolbar -->
            <section
                class="mb-8 flex flex-wrap
                       items-center
                       justify-between gap-4
                       rounded-2xl
                       border border-amber-400/10
                       bg-[#102B20] p-4"
            >
                <!-- Font Controls -->
                <div
                    class="flex items-center gap-3"
                >
                    <span
                        class="text-sm
                               text-emerald-100/60"
                    >
                        লেখার আকার
                    </span>

                    <button
                        type="button"
                        @click="decreaseFont"
                        :disabled="fontSize <= 16"
                        aria-label="লেখা ছোট করুন"
                        class="flex h-10 w-10
                               items-center justify-center
                               rounded-lg border
                               border-amber-400/20
                               text-amber-300
                               disabled:opacity-30
                               hover:bg-amber-400/10"
                    >
                        A-
                    </button>

                    <button
                        type="button"
                        @click="increaseFont"
                        :disabled="fontSize >= 32"
                        aria-label="লেখা বড় করুন"
                        class="flex h-10 w-10
                               items-center justify-center
                               rounded-lg border
                               border-amber-400/20
                               text-amber-300
                               disabled:opacity-30
                               hover:bg-amber-400/10"
                    >
                        A+
                    </button>
                </div>

                <!-- Reading Mode Toggle -->
                <button
                    type="button"
                    @click="toggleReadingMode"
                    class="rounded-lg border
                           border-amber-400/20
                           px-4 py-2.5
                           text-sm font-semibold
                           text-amber-300
                           hover:bg-amber-400/10"
                >
                    {{
                        readingMode
                            ? 'Reading Mode বন্ধ করুন'
                            : '📖 Reading Mode'
                    }}
                </button>
            </section>

            <!-- Progress Information -->
            <section
                class="mb-8 rounded-2xl
                       border border-amber-400/10
                       bg-[#102B20] p-5"
            >
                <div
                    class="mb-3 flex
                           items-center
                           justify-between"
                >
                    <span
                        class="text-sm
                               text-emerald-100/60"
                    >
                        গল্প পড়ার অগ্রগতি
                    </span>

                    <span
                        class="font-bold
                               text-amber-300"
                    >
                        {{ progressLabel }}
                    </span>
                </div>

                <div
                    class="h-2 overflow-hidden
                           rounded-full
                           bg-emerald-950"
                >
                    <div
                        class="h-full
                               rounded-full
                               bg-amber-400
                               transition-all
                               duration-150"
                        :style="{
                            width: progressLabel
                        }"
                    />
                </div>
            </section>

            <!-- Story Content -->
            <article
                class="rounded-2xl
                       border border-amber-400/10
                       bg-[#102B20]
                       px-6 py-10
                       transition-all
                       sm:px-12 sm:py-14"
                :class="{
                    'mx-auto max-w-3xl border-amber-400/20':
                        readingMode
                }"
            >
                <!-- Bismillah -->
                <div
                    class="mb-10 text-center"
                >
                    <p
                        class="text-3xl
                               leading-loose
                               text-amber-300"
                    >
                        بِسْمِ اللَّهِ الرَّحْمَٰنِ الرَّحِيمِ
                    </p>

                    <p
                        class="mt-3 text-sm
                               text-emerald-100/50"
                    >
                        পরম করুণাময় ও অসীম দয়ালু
                        আল্লাহর নামে
                    </p>
                </div>

                <!-- Story Paragraphs -->
                <div
                    class="space-y-8
                           text-justify
                           text-emerald-50/90"
                    :style="{
                        fontSize: `${fontSize}px`,
                        lineHeight: '2.2'
                    }"
                >
                    <p
                        v-for="(paragraph, index) in story.content"
                        :key="index"
                        class="leading-loose"
                    >
                        {{ paragraph }}
                    </p>
                </div>

                <!-- Story Ending -->
                <div
                    class="mt-12
                           border-t
                           border-amber-400/10
                           pt-8 text-center"
                >
                    <div class="mb-4 text-3xl">
                        🌙
                    </div>

                    <h2
                        class="text-2xl font-bold
                               text-amber-300"
                    >
                        গল্প থেকে শিক্ষা
                    </h2>

                    <p
                        class="mt-4
                               leading-8
                               text-emerald-100/70"
                    >
                        আমাদের উচিত এই গল্পের শিক্ষা
                        নিজেদের জীবনে অনুসরণ করা।
                        আল্লাহ আমাদের উত্তম চরিত্র
                        অর্জনের তাওফিক দান করুন।
                        আমিন।
                    </p>
                </div>
            </article>

            <!-- Navigation -->
            <section
                class="mt-10 grid
                       grid-cols-1 gap-4
                       sm:grid-cols-3"
            >
                <!-- Previous Story -->
                <div>
                    <Link
                        v-if="previousStoryId"
                        :href="`/stories/${previousStoryId}/read`"
                        class="block rounded-xl
                               border border-amber-400/20
                               bg-[#102B20] p-4
                               text-center
                               transition
                               hover:border-amber-400/50"
                    >
                        <span
                            class="block text-sm
                                   text-emerald-100/50"
                        >
                            ← আগের গল্প
                        </span>

                        <span
                            class="mt-2 block
                                   font-bold
                                   text-amber-300"
                        >
                            গল্প পড়ুন
                        </span>
                    </Link>
                </div>

                <!-- Back to Details -->
                <div>
                    <Link
                        :href="`/stories/${story.id}`"
                        class="block rounded-xl
                               bg-amber-400 p-4
                               text-center
                               font-bold
                               text-[#102B20]
                               transition
                               hover:bg-amber-300"
                    >
                        গল্পের বিবরণ
                    </Link>
                </div>

                <!-- Next Story -->
                <div>
                    <Link
                        v-if="nextStoryId"
                        :href="`/stories/${nextStoryId}/read`"
                        class="block rounded-xl
                               border border-amber-400/20
                               bg-[#102B20] p-4
                               text-center
                               transition
                               hover:border-amber-400/50"
                    >
                        <span
                            class="block text-sm
                                   text-emerald-100/50"
                        >
                            পরবর্তী গল্প →
                        </span>

                        <span
                            class="mt-2 block
                                   font-bold
                                   text-amber-300"
                        >
                            গল্প পড়ুন
                        </span>
                    </Link>
                </div>
            </section>

            <!-- Back to Library -->
            <div class="mt-8 text-center">
                <Link
                    href="/stories"
                    class="inline-flex
                           items-center gap-2
                           text-sm
                           text-emerald-100/60
                           transition
                           hover:text-amber-300"
                >
                    ← গল্পের লাইব্রেরিতে ফিরে যান
                </Link>
            </div>
        </main>

        <!-- Footer -->
        <footer
            class="border-t
                   border-amber-400/10
                   bg-[#081810]
                   px-5 py-8
                   text-center"
        >
            <p
                class="text-sm
                       text-emerald-100/50"
            >
                © {{ new Date().getFullYear() }}
                IslamicStoryBook.
                সকল স্বত্ব সংরক্ষিত।
            </p>

            <p
                class="mt-2 text-xs
                       text-amber-400/60"
            >
                Stories of the Righteous
            </p>
        </footer>
    </div>
</template>
