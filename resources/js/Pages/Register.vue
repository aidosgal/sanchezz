<template>
    <div class="flex h-screen bg-[url('https://srv451534.hstgr.cloud/images/register.png')] bg-no-repeat bg-cover bg-center">
        <div class="text-white mx-auto py-10 px-10 w-full">
            <a href="/" class="block text-lg font-bold">Back</a>
            <div class="text-center text-4xl font-bold mt-5 bg-clip-text text-transparent bg-gradient-to-r from-[#FFFFFF] via-[#FF7D61] to-[#FF0AC9]">
                Registration
            </div>
            <div class="text-center mt-2">
                Enter your details <br />to create an account
            </div>
            <input
                type="text"
                v-model="name"
                class="block w-full mt-5 py-4 rounded bg-[#1E2330] text-white text-center"
                placeholder="Name"
            />
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
            <input
                type="password"
                v-model="confirm_password"
                class="block w-full mt-5 py-4 rounded bg-[#1E2330] text-white text-center"
                placeholder="Repeat password"
            />
            <a
                href="/login"
                class="block text-center mt-5 bg-clip-text text-transparent bg-gradient-to-b from-[#FFFFFF] to-[#FFCE50]"
            >
                I already have an account
            </a>
            <div class="w-full fixed left-0 bottom-20 px-10">
                <button
                    :class="buttonClasses"
                    class="block text-lg w-full py-3 font-bold mt-5 rounded-full"
                    :disabled="!isFormValid"
                    @click="register"
                >
                    Confirm
                </button>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            name: "",
            email: "",
            password: "",
            confirm_password: "",
        };
    },
    computed: {
        isFormValid() {
            return this.name !== "" && this.email !== "" && this.password !== "" && this.confirm_password !== "";
        },
        buttonClasses() {
            return this.isFormValid ? "text-white bg-[#0095FF]" : "text-[#656D85] bg-[#292F40]";
        },
    },
    methods: {
        async register() {
            if (this.isFormValid) {
                try {
                    const response = await this.$inertia.post('/register', {
                        name: this.name,
                        email: this.email,
                        password: this.password,
                        confirm_password: this.confirm_password,
                    });
                    console.log(response);
                } catch (error) {
                    console.error(error);
                }
            }
        },
    closeKeyboard(event) {
            if (!this.$el.contains(event.target)) {
                // Check if the clicked element is not an input field
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
