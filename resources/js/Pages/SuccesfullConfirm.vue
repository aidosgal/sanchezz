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
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M23.9569 4.7074C26.0327 -0.902456 33.9672 -0.902475 36.0431 4.70739L41.3493 19.0473C41.3671 19.0952 41.4048 19.1329 41.4527 19.1507L55.7926 24.4569C61.4025 26.5327 61.4025 34.4672 55.7926 36.5431L41.4527 41.8493C41.4048 41.8671 41.3671 41.9048 41.3493 41.9527L36.0431 56.2926C33.9673 61.9025 26.0328 61.9025 23.9569 56.2926L18.6507 41.9527C18.6329 41.9048 18.5952 41.8671 18.5473 41.8493L4.2074 36.5431C-1.40246 34.4673 -1.40247 26.5328 4.20739 24.4569L18.5473 19.1507C18.5952 19.1329 18.6329 19.0952 18.6507 19.0473L23.9569 4.7074ZM29.8754 6.80476C29.8719 6.8092 29.8553 6.83059 29.836 6.88285L24.5297 21.2228C23.8771 22.9865 22.4865 24.3771 20.7228 25.0297L6.38285 30.336C6.33059 30.3553 6.3092 30.3719 6.30475 30.3754C6.29952 30.3796 6.29724 30.3824 6.29473 30.3862C6.28755 30.3971 6.26866 30.4358 6.26866 30.5C6.26866 30.5642 6.28755 30.6029 6.29473 30.6138C6.29724 30.6176 6.29953 30.6204 6.30476 30.6246C6.3092 30.6281 6.33059 30.6447 6.38285 30.664L20.7228 35.9703C22.4865 36.6229 23.8771 38.0135 24.5297 39.7772L29.836 54.1172C29.8553 54.1694 29.8719 54.1908 29.8754 54.1952C29.8796 54.2005 29.8824 54.2028 29.8862 54.2053C29.8971 54.2125 29.9358 54.2313 30 54.2313C30.0642 54.2313 30.1029 54.2125 30.1138 54.2053C30.1176 54.2028 30.1204 54.2005 30.1246 54.1952C30.1281 54.1908 30.1447 54.1694 30.164 54.1172L35.4703 39.7772C36.1229 38.0135 37.5135 36.6229 39.2772 35.9703L53.6172 30.664C53.6694 30.6447 53.6908 30.6281 53.6952 30.6246C53.6986 30.6219 53.7007 30.6199 53.7024 30.6177C53.7035 30.6165 53.7043 30.6152 53.7053 30.6138C53.7125 30.6029 53.7313 30.5642 53.7313 30.5C53.7313 30.4358 53.7125 30.3971 53.7053 30.3862C53.7037 30.3838 53.7022 30.3818 53.7 30.3796C53.6987 30.3783 53.6972 30.377 53.6952 30.3754C53.6908 30.3719 53.6694 30.3553 53.6172 30.336L39.2772 25.0297C37.5135 24.3771 36.1229 22.9865 35.4703 21.2228L30.164 6.88285C30.1447 6.83059 30.1281 6.8092 30.1246 6.80475C30.1204 6.79952 30.1176 6.79724 30.1138 6.79473C30.1029 6.78755 30.0642 6.76866 30 6.76866C29.9358 6.76866 29.8971 6.78755 29.8862 6.79473C29.8824 6.79724 29.8796 6.79953 29.8754 6.80476Z" fill="white"/>
                        </svg>
                    </div>
                </div>
                <div class="text-center">
                    Congratulations, you've created an account. Nice playing!
                </div>
            </div>
            <a class="block bg-gradient-to-r from-[#FFFFFF] via-[#FF7D61] to-[#FF0AC9] rounded-full py-4 font-bold mt-5 w-full text-center" href="/dashboard">Go to main menu</a>
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


