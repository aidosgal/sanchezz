<template>
    <div class="w-full h-screen relative">
        <img class="absolute inset-0 object-cover w-full h-full" :src="imageUrl" alt="Background Image">
        <div class="absolute inset-0 flex items-center justify-center text-white text-center">
            Home
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            imageUrl: 'http://localhost/images/backhround.png'
        }
    }
}
</script>

<style scoped>
</style>

