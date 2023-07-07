<script setup>
import { ref } from 'vue';

defineProps({
    generatedShortenedUrl: URL
})
const isLinkCopied = ref(false);
const copyLinkOnClipboard = async (url) => {
    try {
        await navigator.clipboard.writeText(url);
        isLinkCopied.value = true
        console.log('Page URL copied to clipboard');
        setTimeout(() => {
            isLinkCopied.value = false
        }, 2000);
    } catch (err) {
        console.error('Failed to copy: ', err);
    }
}
</script>
<template>
    <div class="w-full bg-blue-950 text text-slate-50 rounded-lg p-4" v-if="generatedShortenedUrl">
        <div class="border-blue-500 border-2 border-dashed rounded-md p-2">
            <div class="flex justify-between px-4 my-[1rem]">
                <p class="font-bold uppercase tracking-wide text-xl">Generated Url</p>
                <button @click="copyLinkOnClipboard(generatedShortenedUrl.href)" title="Copy on clipboard" class="text-xl">
                    <i class='fas' :class="!isLinkCopied ? 'fa-clipboard' : 'fa-clipboard-check text-green-400'"></i>
                </button>
            </div>
            <div class="p-4 text-center">
                <a class="underline" :href="generatedShortenedUrl.href" target="_blank">{{ generatedShortenedUrl.href }}</a>
            </div>
        </div>
    </div>
</template>