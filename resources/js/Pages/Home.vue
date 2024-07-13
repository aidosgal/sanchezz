<template>
    <div class="w-full h-[80vh] bg-no-repeat bg-cover text-white relative" :style="{ backgroundImage: 'url(' + imageUrl + ')' }">
        <div class="absolute bottom-10 w-full">
            <div class="flex w-full">
                <div class="mx-auto text-center">
                    <div class="text-center">Login</div>
                    <div class="text-center">Registration</div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            imageUrl: 'https://srv451534.hstgr.cloud/images/backhround.png'
        }
    }
}
</script>

<style scoped>
</style>

