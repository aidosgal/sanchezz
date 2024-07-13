<template>
    <div>
        <div class="text-center py-16">
            Home
        </div>
        <div class="fixed inset-x-0 bottom-0 bg-gray-900 text-white py-4 text-center">
            Footer content
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
    height: 100%;
    margin: 0;
    padding: 0;
    background: url('https://srv451534.hstgr.cloud/images/backhround.png') no-repeat center center fixed;
    background-size: cover;
}
</style>

