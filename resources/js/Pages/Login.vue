<template>
    <div
        class="flex h-screen bg-[url('https://srv451534.hstgr.cloud/images/register.png')] bg-no-repeat bg-cover bg-bottom"
    >
        <div class="text-white mx-auto py-10 px-10 w-full">
            <a href="/" class="block text-3xl font-bold"><i class="fa-solid text-[#32384D] fa-circle-chevron-left"></i></a>
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
                    :class="['block w-full mt-5 py-4 rounded bg-[#1E2330] text-white text-center border-2', borderColor('email')]"
                    placeholder="Email"
                />
                <input
                    type="password"
                    v-model="password"
                    :class="['block w-full mt-5 py-4 rounded bg-[#1E2330] text-white text-center border-2', borderColor('password')]"
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
            <div v-if="Object.keys(errors).length" class="px-5 py-4 radial-gradient-bg w-full mt-3 rounded-lg">
                <div class="text-center">Alert!</div>
                <div v-for="(errorMessages, fieldName) in errors" :key="fieldName" class="text-center text-red-500">
                    {{ errorMessages }}
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import { Inertia } from '@inertiajs/inertia';

export default {
    props: {
        flash: {
            type: Object,
            default: () => ({})
        },
        errors: {
            type: Object,
            default: () => ({})
        }
    },
    data() {
        return {
            email: "",
            password: "",
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
        login() {
            if (this.isFormValid) {
                Inertia.post('/login', {
                    email: this.email,
                    password: this.password
                }).catch(error => {
                    console.error(error);
                });
            }
        },
        borderColor(field) {
            return this[field] !== "" ? 'border-blue-500' : 'border-[#1E2330]';
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
.radial-gradient-bg {
    background: radial-gradient(circle, #5E001F 0%, #402937 100%);
}
</style>

