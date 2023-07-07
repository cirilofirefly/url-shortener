export function useUrlShortener() {

    const generateShortenedUrl = (originalUrl) => {
        return axios.post('api/shorten-url', { original_url: originalUrl })
    }

    return {
        generateShortenedUrl
    }
}