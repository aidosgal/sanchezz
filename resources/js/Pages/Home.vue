<template>
    <div class="h-screen">
        <div class="w-full px-10 fixed bottom-10" >
        <div class="flex w-full">
            <div class="w-full mx-auto">
                <div class="text-white font-semibold text-xl bg-gradient-to-b from-[#490E56] to-[#791C77] py-3 rounded-t-3xl px-4 w-full text-center cursor-pointer">Register</div>
                <div class="text-white font-semibold text-xl bg-gradient-to-b from-[#2B1131] to-[#3D133C] py-3 px-4 w-full rounded-b-3xl text-center cursor-pointer">Login</div>
                <div class="text-white font-semibold text-xl bg-gradient-to-b from-[#E62C86] to-[#E71770] rounded-3xl mt-5 py-3 w-full text-center rounded cursor-pointer">Watch the game</div>
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

<style>
body {
    margin: 0;
    padding: 0;
    overflow-y: hidden;
    overflow-x: hidden;
    background: url('https://srv451534.hstgr.cloud/images/backhround.png') no-repeat center center fixed;
    background-size: cover;
}
</style>
