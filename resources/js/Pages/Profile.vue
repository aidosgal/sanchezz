<template>
    <div class="h-screen px-5 bg-[url('https://srv451534.hstgr.cloud/images/main.png')] bg-no-repeat bg-cover bg-center">
        <div class="grid grid-cols-3 w-full pt-10 items-center">
            <div class="flex">
                <div class="mx-auto rounded bg-[#32384D] p-3">
                    <i class="fas fa-home text-white text-lg mx-auto"></i>
                </div>
            </div>
            <div>
                <img class="w-full h-[40px] rounded-full object-cover" :src="`https://srv451534.hstgr.cloud/images/${user.avatar_url}`" />
                <div class="text-center text-white mt-[3px] text-sm">{{ user.name }}</div>
            </div>
            <div class="flex">
                <div class="mx-auto rounded bg-[#32384D] p-3">
                    <i class="fas fa-user text-[#33CCFF] text-lg mx-auto"></i>
                </div>
            </div>
        </div>
        <div class="text-[#7A8299] text-center mt-3">Total earned</div>
        <div class="text-white text-center text-5xl mt-3 font-bold">$ 23,970.30</div>
        <div class="max-w-md mx-auto p-5 rounded-lg">
            <form @submit.prevent="updateProfile">
                <input
                    v-model="form.email"
                    type="email"
                    class="block placeholder w-full mt-2 py-4 rounded bg-[#2E3440] text-white text-right px-4 input-left-placeholder"
                    placeholder="Email"
                    :disabled="!editable"
                />
                <input
                    v-model="form.name"
                    type="text"
                    class="block w-full mt-2 py-4 rounded bg-[#2E3440] text-white text-right px-4 input-left-placeholder"
                    placeholder="Name"
                    :disabled="!editable"
                />
                <input
                    v-model="form.avatar_url"
                    type="text"
                    class="block w-full mt-2 py-4 rounded bg-[#2E3440] text-white text-right px-4 input-left-placeholder"
                    placeholder="Avatar URL"
                    :disabled="!editable"
                />
                <button
                    :class="buttonClasses"
                    class="block text-lg w-full py-3 font-bold mt-5 rounded-full"
                >
                    {{ buttonText }}
                </button>
            </form>
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
            form: {
                email: this.user.email,
                name: this.user.name,
                password: '',
                avatar_url: this.user.avatar_url,
            },
            editable: false,
        };
    },
    computed: {
        buttonText() {
            return this.editable ? 'Confirm' : 'Change Data';
        },
        buttonClasses() {
            return this.editable
                ? 'text-white bg-[#0095FF]'
                : 'text-[#656D85] bg-[#292F40]';
        }
    },
    methods: {
        updateProfile() {
            if (this.editable) {
                console.log('Updating profile with', this.form);
                this.editable = false;
            } else {
                this.editable = true;
            }
        }
    }
};
</script>

<style>
.input-left-placeholder::placeholder {
    text-align: left;
}
.placeholder
{
    position: relative;
}

.placeholder::after
{
    position: absolute;
    left: 5px;
    top: 3px;
    content: attr(data-placeholder);
    pointer-events: none;
    opacity: 0.6;
}
</style>

