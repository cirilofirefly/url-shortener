import { ref } from "vue"

export function useLoader() {

    const isLoading = ref(false);
    const toggleLoading = () => {
        isLoading.value = !isLoading.value
    }

    return {
        isLoading,
        toggleLoading
    }
}