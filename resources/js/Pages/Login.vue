<template>
    <div
        class="flex h-screen bg-[url('https://srv451534.hstgr.cloud/images/register.png')] bg-no-repeat bg-cover bg-center"
    >
        <div class="text-white mx-auto py-10 px-10 w-full">
            <a href="/" class="block text-lg font-bold">Back</a>
            <div
                class="text-center text-4xl font-bold mt-5 bg-clip-text text-transparent bg-gradient-to-r from-[#FFFFFF] via-[#FF7D61] to-[#FF0AC9]"
            >
                Log in
            </div>
            <div class="text-center mt-2">
                Enter your details <br />to login into an account
            </div>
            <form @submit.prevent="login">
                <input
                    type="text"
                    v-model="email"
                    class="block w-full mt-5 py-4 rounded bg-[#1E2330] text-white text-center"
                    placeholder="Email"
                />
                <input
                    type="password"
                    v-model="password"
                    class="block w-full mt-5 py-4 rounded bg-[#1E2330] text-white text-center"
                    placeholder="Password"
                />
                <a
                    href="/register"
                    class="block text-center mt-5 bg-clip-text text-transparent bg-gradient-to-b from-[#FFFFFF] to-[#FFCE50]"
                >I don't have an account</a
                >
                <div class="w-full fixed left-0 bottom-20 px-10">
                    <button
                        :class="buttonClasses"
                        class="block text-lg w-full py-3 font-bold mt-5 rounded-full"
                        :disabled="!isFormValid"
                    >
                        Confirm
                    </button>
                </div>
            </form>
        </div>
    </div>
</template>

<script>
export default {
    props: {
        flash: Object
    },
    data() {
        return {
            email: "",
            password: "",
            error: null,
        };
    },
    computed: {
        isFormValid() {
            return this.email !== "" && this.password !== "";
        },
        buttonClasses() {
            return this.isFormValid
                ? "text-white bg-[#0095FF]"
                : "text-[#656D85] bg-[#292F40]";
        },
    },
    methods: {
        async login(event) {
            if (this.isFormValid) {
                try {
                    const response = await this.$inertia.post('/login', {
                        email: this.email,
                        password: this.password
                    });
                } catch (error) {
                    console.error(error);
                    if (error.response && error.response.data) {
                        this.error = error.response.data;
                    } else {
                        this.error = 'Login failed. Please try again.';
                    }
                }
            }
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
</style>
