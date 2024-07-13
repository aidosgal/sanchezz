<template>
    <div class="w-full h-screen bg-no-repeat bg-cover text-white text-center" :style="{ backgroundImage: 'url(' + imageUrl + ')' }">
       Home
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

