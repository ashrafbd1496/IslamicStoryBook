
<script setup lang="ts">
import { computed, ref } from 'vue'
import { Head, Link } from '@inertiajs/vue3'

import Navbar from '@/components/Shared/Navbar.vue'
import CategoryCard from '@/components/Categories/CategoryCard.vue'

interface Category {
    id: number
    name: string
    slug: string
    description: string
    icon: string
    story_count: number
}

const props = defineProps<{
    categories: Category[]
}>()

const searchQuery = ref('')

const filteredCategories = computed(() => {
    const query = searchQuery.value.trim().toLowerCase()

    if (!query) {
        return props.categories
    }

    return props.categories.filter((category) => {
        return (
            category.name.toLowerCase().includes(query) ||
            category.description.toLowerCase().includes(query)
        )
    })
})
</script>

<template>
    <Head title="গল্পের বিভাগ | IslamicStoryBook" />

    <div
        class="min-h-screen
               bg-[#0B1F16]
               font-['Hind_Siliguri']
               text-emerald-50"
    >
        <!-- Navbar -->
        <Navbar />

        <!-- Hero Section -->
        <section
            class="border-b border-amber-400/10
                   bg-gradient-to-b
                   from-[#183D2D] to-[#0B1F16]"
        >
            <div
                class="mx-auto max-w-7xl
                       px-5 py-16
                       text-center sm:px-8"
            >
                <p
                    class="mb-4 text-xs
                           font-bold tracking-[0.2em]
                           text-amber-400"
                >
                    EXPLORE ISLAMIC STORIES
                </p>

                <h1
                    class="text-3xl font-bold
                           leading-relaxed
                           text-amber-300
                           sm:text-5xl"
                >
                    গল্পের বিভাগ
                </h1>

                <p
                    class="mx-auto mt-5
                           max-w-2xl
                           text-base leading-8
                           text-emerald-100/60
                           sm:text-lg"
                >
                    নবীদের গল্প, সাহাবীদের গল্প,
                    কুরআনের গল্প এবং নৈতিক শিক্ষার
                    গল্প থেকে আপনার পছন্দের গল্প
                    বেছে নিন।
                </p>

                <!-- Breadcrumb -->
                <div
                    class="mt-8 flex
                           items-center
                           justify-center gap-3
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

                    <span class="text-amber-300">
                        গল্পের বিভাগ
                    </span>
                </div>
            </div>
        </section>

        <!-- Main Content -->
        <main
            class="mx-auto max-w-7xl
                   px-5 py-12 sm:px-8"
        >
            <!-- Search -->
            <section
                class="mb-10
                       rounded-2xl
                       border border-amber-400/10
                       bg-[#102B20]
                       p-5 sm:p-8"
            >
                <label
                    for="category-search"
                    class="mb-4 block
                           text-lg font-bold
                           text-amber-300"
                >
                    🔎 গল্পের বিভাগ খুঁজুন
                </label>

                <input
                    id="category-search"
                    v-model="searchQuery"
                    type="search"
                    placeholder="বিভাগের নাম লিখুন..."
                    class="w-full rounded-xl
                           border border-amber-400/15
                           bg-[#0B1F16]
                           px-5 py-4
                           text-emerald-50
                           placeholder:text-emerald-100/30
                           outline-none
                           transition
                           focus:border-amber-400/50"
                />
            </section>

            <!-- Category Header -->
            <div
                class="mb-8 flex
                       flex-wrap
                       items-center
                       justify-between gap-4"
            >
                <div>
                    <p
                        class="mb-2 text-xs
                               font-bold tracking-widest
                               text-amber-400"
                    >
                        STORY COLLECTIONS
                    </p>

                    <h2
                        class="text-2xl font-bold
                               text-amber-300
                               sm:text-3xl"
                    >
                        সকল গল্পের বিভাগ
                    </h2>

                    <p
                        class="mt-3 text-sm
                               text-emerald-100/50"
                    >
                        আপনার পছন্দের বিভাগ নির্বাচন করুন।
                    </p>
                </div>

                <span
                    class="rounded-full
                           border border-amber-400/15
                           bg-[#102B20]
                           px-4 py-2
                           text-sm
                           text-amber-300"
                >
                    {{ filteredCategories.length }} টি বিভাগ
                </span>
            </div>

            <!-- Category Grid -->
            <section
                v-if="filteredCategories.length > 0"
                class="grid grid-cols-1
                       gap-5 sm:grid-cols-2
                       lg:grid-cols-3
                       xl:grid-cols-4"
            >
                <CategoryCard
                    v-for="category in filteredCategories"
                    :key="category.id"
                    :category="category"
                />
            </section>

            <!-- No Result -->
            <section
                v-else
                class="rounded-2xl
                       border border-amber-400/10
                       bg-[#102B20]
                       px-6 py-16
                       text-center"
            >
                <div class="mb-5 text-5xl">
                    📚
                </div>

                <h3
                    class="text-xl font-bold
                           text-amber-300"
                >
                    কোনো বিভাগ পাওয়া যায়নি
                </h3>

                <p
                    class="mt-3
                           text-emerald-100/50"
                >
                    অন্য কোনো নাম দিয়ে অনুসন্ধান করুন।
                </p>

                <button
                    type="button"
                    @click="searchQuery = ''"
                    class="mt-6 rounded-xl
                           bg-amber-400
                           px-5 py-3
                           font-bold
                           text-[#102B20]
                           hover:bg-amber-300"
                >
                    সকল বিভাগ দেখুন
                </button>
            </section>
        </main>

        <!-- Footer -->
        <footer
            class="border-t border-amber-400/10
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
