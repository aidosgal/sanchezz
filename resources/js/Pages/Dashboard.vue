<template>
    <div class="h-screen px-5 bg-[url('https://srv451534.hstgr.cloud/images/main.png')] bg-no-repeat bg-cover bg-center">
        <div class="grid grid-cols-3 w-full py-10 items-center">
            <div class="flex">
                <div class="mx-auto rounded bg-[#32384D] p-3">
                    <i class="fas fa-home text-white text-lg mx-auto"></i>
                </div>
            </div>
            <div>
                <div><img class="w-full h-[40px] rounded-full object-cover" :src="`https://srv451534.hstgr.cloud/images/${user.avatar_url}`" /></div>
                <div class="text-center text-white mt-[3px] text-sm">{{ user.name }}</div>
            </div>
            <div class="flex">
                <div class="mx-auto rounded bg-[#32384D] p-3">
                    <i class="fas fa-user text-[#33CCFF] text-lg mx-auto"></i>
                </div>
            </div>
        </div>
        <div class="text-[#7A8299] text-center">Total balance</div>
        <div class="text-white text-center text-5xl mt-3 font-bold">$ 23,970.30</div>
        <div class="text-[#7A8299] text-center mt-5">This month</div>
        <div class="flex">
            <div class="flex mx-auto">
                <div class="flex items-center gap-2">
                    <i class="fa-sharp fa-solid fa-caret-down text-green-500 text-3xl"></i>
                    <div class="text-white">$5454</div>
                </div>
                <div class="flex items-center ml-4 gap-2">
                    <i class="fa-sharp fa-solid fa-caret-up text-red-500 text-3xl"></i>
                    <div class="text-white">$2346</div>
                </div>
            </div>
        </div>
        <div class="flex w-full mt-3">
            <div class="text-white flex mx-auto">
                <div class="flex px-10 bg-[#0095FF] py-4 rounded-l-full">
                    <i class="fa-solid fa-arrow-up-right"></i>
                    <div>Deposit</div>
                </div>
                <div class="flex px-10 bg-[#8972FF] py-4 rounded-r-full">
                    <div>Withdraw</div>
                </div>
            </div>
        </div>
        <div class="flex w-full">
            <div class="mx-auto w-full px-7">
                <form @submit.prevent="play">
                    <div class="relative">
                        <input
                            type="number"
                            v-model="rate"
                            class="block w-full mt-2 py-4 rounded bg-[#1E2330] text-white text-right px-5 input-left-placeholder"
                            placeholder="Rate"
                        />
                    </div>
                    <div class="relative">
                        <input
                            type="number"
                            v-model="player_count"
                            class="block w-full mt-2 py-4 rounded bg-[#1E2330] text-white text-right px-5 input-left-placeholder"
                            placeholder="Player count"
                        />
                    </div>
                    <button
                        :class="buttonClasses"
                        class="block text-lg w-full py-3 font-bold mt-5 rounded-full"
                        :disabled="!isFormValid"
                    >
                        Play
                    </button>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props: {
        user: {
            type: Object,
            required: true
        }
    },
    data() {
        return {
            rate: "",
            player_count: "",
            error: null,
        };
    },
    computed: {
        isFormValid() {
            return this.rate !== "" && this.player_count !== "";
        },
        buttonClasses() {
            return this.isFormValid
                ? "text-white bg-[#0095FF]"
                : "text-[#656D85] bg-[#292F40]";
        },
    },
    methods: {
        async play(event) {

        },
        closeKeyboard(event) {
            if (!this.$el.contains(event.target)) {
                if (
                    document.activeElement &&
                    (document.activeElement.tagName === 'INPUT' || document.activeElement.tagName === 'TEXTAREA')
                ) {
                    document.activeElement.blur();
                }
            }
        }
    },
    mounted() {
        document.addEventListener('click', this.closeKeyboard);
    },
    beforeDestroy() {
        document.removeEventListener('click', this.closeKeyboard);
    }
};
</script>

<style>
body {
    margin: 0;
    padding: 0;
    overflow-y: hidden;
    overflow-x: hidden;
    background-size: cover;
}

.input-left-placeholder::placeholder {
    text-align: left;
}
</style>
