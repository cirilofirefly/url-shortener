<script setup>
import { ref } from 'vue';
import { useUrlShortener } from '@/composables/useUrlShortener'
import { useLoader } from '@/composables/useLoader'

const { generateShortenedUrl } = useUrlShortener();
const { isLoading, toggleLoading } = useLoader();

const emit = defineEmits(['onGeneratedShortenedUrl'])
const originalUrl = ref('');
const errors = ref({
    original_url: []
})

const generateUrl = async () => {
    toggleLoading();
    errors.value.original_url = []
    await generateShortenedUrl(originalUrl.value)
        .then(({ data }) => {
            originalUrl.value = data.original_url
            emit('onGeneratedShortenedUrl', new URL(data.shortened_url))
            toggleLoading();
        })
        .catch(({ response }) => {
            if (response.status == 422)
                errors.value.original_url = response.data.errors['original_url'] ?? []
            toggleLoading();
        });
}

</script>
<template>
    <form @submit.prevent="generateUrl" class="w-full h-[5rem] mb-4">
        <div class="flex items-center justify-between space-x-5 mt-4 mb-2">
            <input type="text" v-model="originalUrl" :disabled="isLoading"
                class="grow rounded-lg bg-slate-50 border-[3px] border-blue-800 px-2 py-1" required>
            <button :disabled="isLoading" type="submit"
                class="outline-none px-3 py-2 bg-blue-800 text-slate-50 rounded-lg shadow-sm disabled:opacity-50">
                <i class="fas fa-spinner fa-spin" v-if="isLoading"></i>
                {{ isLoading ? 'Processing...' : 'Shorten URL' }}
            </button>
        </div>
        <p class="text-red-500 text-start" v-for="message in errors.original_url" :key="message">{{ message }}</p>
    </form>
</template>