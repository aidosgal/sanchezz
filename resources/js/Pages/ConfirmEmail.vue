<template>
    <div class="flex h-screen bg-[url('https://srv451534.hstgr.cloud/images/register.png')] bg-no-repeat bg-cover bg-bottom">
        <div class="text-white mx-auto py-10 px-10 w-full">
            <a href="/" class="block text-3xl font-bold"><i class="fa-solid text-[#32384D] fa-circle-chevron-left"></i></a>
            <div class="text-center text-4xl font-bold mt-5 bg-clip-text text-transparent bg-gradient-to-r from-[#FFFFFF] via-[#FF7D61] to-[#FF0AC9]">
                Registration
            </div>
            <div class="text-center mt-2">
                Enter your details <br />to create an account
            </div>
            <div class="mt-5 mb-5 px-7 py-10 rounded-lg gradient-bg">
                <div class="flex">
                    <div class="mx-auto">
                        <svg width="60" height="61" viewBox="0 0 60 61" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M0.00390625 16.7078C0.00390625 11.1851 4.36324 6.50086 9.9926 6.50086H50.0067C55.636 6.50086 59.9954 11.1851 59.9954 16.7078V44.294C59.9954 49.8166 55.636 54.5009 50.0067 54.5009H9.9926C4.36324 54.5009 0.00390625 49.8166 0.00390625 44.294V16.7078ZM11.4166 13.1215L29.9996 26.4257L48.5827 13.1215H11.4166ZM53.356 17.8545L33.8337 31.8311C31.5348 33.4769 28.4645 33.4769 26.1655 31.8311L6.64328 17.8545V44.294C6.64328 46.3891 8.25558 47.8802 9.9926 47.8802H50.0067C51.7437 47.8802 53.356 46.3891 53.356 44.294V17.8545Z" fill="#8972FF"/>
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M9.9926 6.50086C4.36324 6.50086 0.00390625 11.1851 0.00390625 16.7078V44.294C0.00390625 49.8166 4.36324 54.5009 9.9926 54.5009H50.0067C55.636 54.5009 59.9954 49.8166 59.9954 44.294V16.7078C59.9954 11.1851 55.636 6.50086 50.0067 6.50086H9.9926ZM29.9996 26.4257L11.4166 13.1215H48.5827L29.9996 26.4257ZM53.356 17.8545L33.8337 31.8311C31.5348 33.4769 28.4645 33.4769 26.1655 31.8311L6.64328 17.8545V44.294C6.64328 46.3891 8.25558 47.8802 9.9926 47.8802H50.0067C51.7437 47.8802 53.356 46.3891 53.356 44.294V17.8545Z" fill="#8972FF"/>
                        </svg>
                    </div>
                </div>
                <div class="text-center">
                    Letter with a confirmation code is on your Email
                </div>
            </div>
            <input
                type="text"
                v-model="email"
                :class="['block w-full mt-5 py-4 rounded bg-[#1E2330] text-white text-center border-2', borderColor('email')]"
                placeholder="Enter a code"
            />
        </div>
    </div>
</template>

<script>
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
            name: "nickname",
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
    watch: {
        email(newValue) {
            if (newValue.length === 6) {
                location.href = '/success';
            }
        }
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
        borderColor(field) {
            return this[field] !== "" ? 'border-blue-500' : 'border-[#1E2330]';
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

<style>
body {
    margin: 0;
    padding: 0;
    overflow-y: hidden;
    overflow-x: hidden;
    background-size: cover;
}
.gradient-bg {
    background: radial-gradient(circle at bottom right, #FF7D61 10%, #712572 40%, #29243C 60%);
}
</style>

