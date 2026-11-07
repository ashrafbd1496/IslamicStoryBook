
<script setup lang="ts">
import { computed, ref, watch } from 'vue'
import { Head } from '@inertiajs/vue3'

import Navbar from '@/components/Shared/Navbar.vue'
import StoryGrid from '@/components/Shared/StoryGrid.vue'

interface Story {
    id: number
    title: string
    category: string
    age: string
    description: string
    cover: string
    icon: string
    premium: boolean
}

// Search
const searchQuery = ref('')

// Filters
const selectedCategory = ref('all')
const selectedAge = ref('all')
const selectedSort = ref('default')


// Pagination
const currentPage = ref(1)
const perPage = 8

// Sample Story Data
const stories = ref<Story[]>([
    {
        id: 1,
        title: 'আসহাবে উখদুদের গল্প',
        category: 'কুরআনের গল্প',
        age: '৯-১২ বছর',
        description: 'ঈমান, ধৈর্য এবং সত্যের পথে অবিচল থাকার হৃদয়স্পর্শী কাহিনি।',
        cover: 'from-emerald-950 via-green-800 to-emerald-700',
        icon: '🌙',
        premium: false,
    },
    {
        id: 2,
        title: 'একজন বুদ্ধিমান বালক',
        category: 'নেককারদের গল্প',
        age: '৬-৮ বছর',
        description: 'বুদ্ধিমত্তা, সাহস ও আল্লাহর প্রতি বিশ্বাসের গল্প।',
        cover: 'from-amber-950 via-yellow-900 to-amber-700',
        icon: '📖',
        premium: true,
    },
    {
        id: 3,
        title: 'হযরত ইউসুফ (আ.)-এর কাহিনি',
        category: 'নবীদের গল্প',
        age: '৯-১২ বছর',
        description: 'সবর, ক্ষমা ও উত্তম চরিত্রের শিক্ষায় সমৃদ্ধ কাহিনি।',
        cover: 'from-teal-950 via-teal-800 to-emerald-700',
        icon: '✨',
        premium: false,
    },
    {
        id: 4,
        title: 'সৎ রাখালের গল্প',
        category: 'নৈতিক শিক্ষার গল্প',
        age: '৩-৫ বছর',
        description: 'সততা ও আমানতদারিতার সুন্দর শিক্ষা নিয়ে একটি গল্প।',
        cover: 'from-orange-950 via-amber-800 to-orange-700',
        icon: '🐑',
        premium: false,
    },
    {
        id: 5,
        title: 'আসহাবে কাহাফ',
        category: 'কুরআনের গল্প',
        age: '৯-১২ বছর',
        description: 'ঈমান ও আল্লাহর রহমতের এক বিস্ময়কর কাহিনি।',
        cover: 'from-indigo-950 via-blue-900 to-indigo-700',
        icon: '🌌',
        premium: false,
    },
    {
        id: 6,
        title: 'হযরত ইবরাহিম (আ.)',
        category: 'নবীদের গল্প',
        age: '৬-৮ বছর',
        description: 'তাওহিদ ও আল্লাহর প্রতি আনুগত্যের গল্প।',
        cover: 'from-rose-950 via-red-900 to-amber-800',
        icon: '⭐',
        premium: true,
    },
    {
        id: 7,
        title: 'সত্যবাদী বালক',
        category: 'নৈতিক শিক্ষার গল্প',
        age: '৩-৫ বছর',
        description: 'সত্য কথা বলার সুন্দর শিক্ষা।',
        cover: 'from-cyan-950 via-teal-800 to-green-700',
        icon: '🌱',
        premium: false,
    },
    {
        id: 8,
        title: 'দয়ালু খলিফা',
        category: 'সাহাবীদের গল্প',
        age: '৯-১২ বছর',
        description: 'ন্যায়বিচার ও মানুষের প্রতি দয়ার গল্প।',
        cover: 'from-purple-950 via-violet-900 to-purple-700',
        icon: '🏰',
        premium: false,
    },
])

// Category Options
const categories = [
    'কুরআনের গল্প',
    'নবীদের গল্প',
    'সাহাবীদের গল্প',
    'নেককারদের গল্প',
    'নৈতিক শিক্ষার গল্প',
]

// Age Options
const ageGroups = [
    '৩-৫ বছর',
    '৬-৮ বছর',
    '৯-১২ বছর',
]

// Filter Stories
const filteredStories = computed(() => {
    return stories.value.filter((story) => {
        const query = searchQuery.value.trim().toLowerCase()

        const matchesSearch =
            !query ||
            story.title.toLowerCase().includes(query) ||
            story.description.toLowerCase().includes(query) ||
            story.category.toLowerCase().includes(query)

        const matchesCategory =
            selectedCategory.value === 'all' ||
            story.category === selectedCategory.value

        const matchesAge =
            selectedAge.value === 'all' ||
            story.age === selectedAge.value

        return matchesSearch && matchesCategory && matchesAge
    })
})


	// Sort Filtered Stories
	const sortedStories = computed(() => {
		const result = [...filteredStories.value]

		if (selectedSort.value === 'az') {
			return result.sort((a, b) =>
				a.title.localeCompare(b.title, 'bn')
			)
		}

		if (selectedSort.value === 'za') {
			return result.sort((a, b) =>
				b.title.localeCompare(a.title, 'bn')
			)
		}

		return result
	})



// Pagination Calculation
const totalPages = computed(() => {
    return Math.ceil(filteredStories.value.length / perPage)
})

const paginatedStories = computed(() => {
    const start = (currentPage.value - 1) * perPage

    return sortedStories.value.slice(
        start,
        start + perPage
    )
})


// Reset Page When Filters Change
watch(
    [searchQuery, selectedCategory, selectedAge, selectedSort],
    () => {
        currentPage.value = 1
    }
)

// Change Page
function changePage(page: number) {
    if (page >= 1 && page <= totalPages.value) {
        currentPage.value = page

        window.scrollTo({
            top: 0,
            behavior: 'smooth',
        })
    }
}

// Reset Filters
function resetFilters() {
    searchQuery.value = ''
    selectedCategory.value = 'all'
    selectedAge.value = 'all'
	selectedSort.value = 'default'
    currentPage.value = 1
}
</script>

<template>
    <Head title="গল্পের লাইব্রেরি | IslamicStoryBook" />

    <div
        class="min-h-screen bg-[#0B1F16]
               font-['Hind_Siliguri']
               text-emerald-50"
    >
        <!-- Navbar -->
        <Navbar />

        <!-- Page Header -->
        <section
            class="border-b border-amber-400/10
                   bg-gradient-to-b
                   from-[#183D2D] to-[#0B1F16]"
        >
            <div
                class="mx-auto max-w-7xl
                       px-5 py-14 text-center
                       sm:px-8 lg:px-12"
            >
                <p
                    class="mb-3 text-sm font-semibold
                           tracking-widest
                           text-amber-400"
                >
                    ISLAMIC STORY LIBRARY
                </p>

                <h1
                    class="mb-4 text-3xl font-bold
                           text-amber-300
                           sm:text-5xl"
                >
                    গল্পের লাইব্রেরি
                </h1>

                <p
                    class="mx-auto max-w-2xl
                           leading-8
                           text-emerald-100/70"
                >
                    শিশুদের জন্য নবী-রাসূল, সাহাবী,
                    নেককার ও শিক্ষণীয় ইসলামিক গল্পের
                    বিশাল সংগ্রহ।
                </p>
            </div>
        </section>

        <!-- Main Content -->
        <main
            class="mx-auto max-w-7xl
                   px-5 py-12 sm:px-8 lg:px-12"
        >
            <!-- Search and Filters -->
            <section
                class="mb-10 rounded-2xl
                       border border-amber-400/10
                       bg-[#102B20] p-5 sm:p-7"
            >
                <h2
                    class="mb-5 text-xl font-bold
                           text-amber-300"
                >
                    🔍 গল্প খুঁজুন
                </h2>

                <div
                    class="grid grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-4"
                >
                    <!-- Search Input -->
					
                    <div class="md:col-span-1">
                        <label
                            for="story-search"
                            class="mb-2 block text-sm
                                   text-emerald-100/70"
                        >
                            গল্পের নাম
                        </label>

                        <input
                            id="story-search"
                            v-model="searchQuery"
                            type="search"
                            placeholder="গল্পের নাম লিখুন..."
                            class="w-full rounded-xl
                                   border border-amber-400/20
                                   bg-[#0B1F16] px-4 py-3
                                   text-white outline-none
                                   placeholder:text-emerald-100/40
                                   focus:border-amber-400
                                   focus:ring-1
                                   focus:ring-amber-400/30"
                        />
                    </div>

                    <!-- Category Filter -->
                    <div>
                        <label
                            for="category-filter"
                            class="mb-2 block text-sm
                                   text-emerald-100/70"
                        >
                            গল্পের বিভাগ
                        </label>

                        <select
                            id="category-filter"
                            v-model="selectedCategory"
                            class="w-full rounded-xl
                                   border border-amber-400/20
                                   bg-[#0B1F16] px-4 py-3
                                   text-emerald-50
                                   outline-none
                                   focus:border-amber-400"
                        >
                            <option value="all">
                                সকল বিভাগ
                            </option>

                            <option
                                v-for="category in categories"
                                :key="category"
                                :value="category"
                            >
                                {{ category }}
                            </option>
                        </select>
                    </div>

                    <!-- Age Filter -->
                    <div>
                        <label
                            for="age-filter"
                            class="mb-2 block text-sm
                                   text-emerald-100/70"
                        >
                            বয়স অনুযায়ী
                        </label>

                        <select
                            id="age-filter"
                            v-model="selectedAge"
                            class="w-full rounded-xl
                                   border border-amber-400/20
                                   bg-[#0B1F16] px-4 py-3
                                   text-emerald-50
                                   outline-none
                                   focus:border-amber-400"
                        >
                            <option value="all">
                                সকল বয়স
                            </option>

                            <option
                                v-for="age in ageGroups"
                                :key="age"
                                :value="age"
                            >
                                {{ age }}
                            </option>
                        </select>
                    </div>
					
					<!-- Title Sorting -->
					<div>
						<label
							for="sort-filter"
							class="mb-2 block text-sm
								   text-emerald-100/70"
						>
							শিরোনাম অনুযায়ী সাজান
						</label>

						<select
							id="sort-filter"
							v-model="selectedSort"
							class="w-full rounded-xl
								   border border-amber-400/20
								   bg-[#0B1F16] px-4 py-3
								   text-emerald-50 outline-none
								   focus:border-amber-400"
						>
							<option value="default">
								ডিফল্ট ক্রম
							</option>
							<option value="az">
								শিরোনাম: A–Z
							</option>
							<option value="za">
								শিরোনাম: Z–A
							</option>
						</select>
					</div>

                </div>

                <!-- Reset Filters -->
                <div class="mt-5 flex justify-stretch sm:justify-end">
                    <button
                        type="button"
                        @click="resetFilters"
                        class="w-full sm:w-auto rounded-lg border rounded-lg border
                               border-amber-400/20
                               px-4 py-2 text-sm
                               text-amber-300
                               transition
                               hover:bg-amber-400/10"
                    >
                        ✕ Filter Reset
                    </button>
                </div>
            </section>

            <!-- Story Results -->
            <section>
                <div
                    class="mb-7 flex flex-wrap
                           items-center justify-between gap-3"
                >
                    <div>
                        <h2
                            class="text-2xl font-bold
                                   text-amber-300"
                        >
                            সকল ইসলামিক গল্প
                        </h2>

                        <p
                            class="mt-2 text-sm
                                   text-emerald-100/50"
                        >
                            আপনার পছন্দের গল্প নির্বাচন করুন।
                        </p>
                    </div>

                    <span
                        class="rounded-full
                               border border-amber-400/20
                               bg-[#102B20]
                               px-4 py-2 text-sm
                               text-amber-300"
                    >
                        {{ filteredStories.length }} টি গল্প
                    </span>
                </div>

                <!-- Story Grid -->
				
                <StoryGrid
					v-if="paginatedStories.length"
					:stories="paginatedStories"
				/>

				<div
					v-else
					class="rounded-2xl border
						   border-dashed border-amber-400/25
						   bg-[#102B20] px-6 py-16
						   text-center"
				>
					<p class="text-4xl">📚</p>

					<h3
						class="mt-4 text-xl font-bold
							   text-amber-300"
					>
						কোনো গল্প পাওয়া যায়নি
					</h3>

					<p
						class="mx-auto mt-2 max-w-md
							   text-sm leading-7
							   text-emerald-100/60"
					>
						অন্য কোনো নাম লিখে খুঁজুন অথবা
						ফিল্টারগুলো পরিবর্তন করুন।
					</p>

					<button
						type="button"
						@click="resetFilters"
						class="mt-6 rounded-lg
							   border border-amber-400/30
							   px-5 py-2.5 text-sm
							   text-amber-300 transition
							   hover:bg-amber-400/10"
					>
						সব ফিল্টার রিসেট করুন
					</button>
				</div>

                <!-- Pagination -->
                <div
                    v-if="totalPages > 1"
                    class="mt-12 flex flex-wrap
                           items-center justify-center gap-2"
                >
                    <button
                        type="button"
                        :disabled="currentPage === 1"
                        @click="changePage(currentPage - 1)"
                        class="rounded-lg border
                               border-amber-400/20
                               px-4 py-2 text-sm
                               text-amber-300
                               disabled:cursor-not-allowed
                               disabled:opacity-30"
                    >
                        ← Previous
                    </button>

                    <button
                        v-for="page in totalPages"
                        :key="page"
                        type="button"
                        @click="changePage(page)"
                        class="h-10 w-10 rounded-lg
                               border text-sm font-semibold
                               transition"
                        :class="
                            currentPage === page
                                ? 'border-amber-400 bg-amber-400 text-[#102B20]'
                                : 'border-amber-400/20 text-amber-300 hover:bg-amber-400/10'
                        "
                    >
                        {{ page }}
                    </button>

                    <button
                        type="button"
                        :disabled="currentPage === totalPages"
                        @click="changePage(currentPage + 1)"
                        class="rounded-lg border
                               border-amber-400/20
                               px-4 py-2 text-sm
                               text-amber-300
                               disabled:cursor-not-allowed
                               disabled:opacity-30"
                    >
                        Next →
                    </button>
                </div>
            </section>
        </main>

        <!-- Footer -->
        <footer
            class="border-t border-amber-400/10
                   bg-[#081810] px-5 py-8
                   text-center"
        >
            <p class="text-sm text-emerald-100/50">
                © {{ new Date().getFullYear() }}
                IslamicStoryBook. সকল স্বত্ব সংরক্ষিত।
            </p>

            <p class="mt-2 text-xs text-amber-400/60">
                Stories of the Righteous
            </p>
        </footer>
    </div>
</template>
