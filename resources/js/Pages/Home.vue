<template>
    <div>
        <div class="text-center py-16">
            Home
        </div>
    </div>
</template>

<script>
export default {
    mounted() {
        document.body.style.overflowY = 'hidden';
    },
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
    background: url('https://srv451534.hstgr.cloud/images/backhround.png') no-repeat center center fixed;
    background-size: cover;
}
</style>

