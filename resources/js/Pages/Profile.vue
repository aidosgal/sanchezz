<template>
    <div class="h-screen px-5 bg-[url('https://srv451534.hstgr.cloud/images/main.png')] bg-no-repeat bg-cover bg-center">
        <div class="grid grid-cols-3 w-full pt-10 items-center">
            <a href="/" class="flex">
                <div class="mx-auto rounded bg-[#32384D] p-3">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M11.1434 0.152076C11.5088 -0.050692 11.953 -0.050692 12.3184 0.152076L22.0388 5.54699C22.4228 5.76013 22.661 6.1645 22.661 6.60338V17.3932C22.661 17.8321 22.4228 18.2365 22.0388 18.4496L12.3184 23.8445C11.953 24.0473 11.5088 24.0473 11.1434 23.8445L1.42299 18.4496C1.03896 18.2365 0.800791 17.8321 0.800791 17.3932V6.60338C0.800791 6.1645 1.03896 5.76013 1.42299 5.54699L11.1434 0.152076ZM3.2201 7.31444V16.6821L11.7309 21.4057L20.2417 16.6821V7.31444L11.7309 2.59089L3.2201 7.31444ZM11.7309 9.61014C10.2884 9.61014 9.19915 10.7228 9.19915 11.9983C9.19915 13.2738 10.2884 14.3864 11.7309 14.3864C13.1734 14.3864 14.2626 13.2738 14.2626 11.9983C14.2626 10.7228 13.1734 9.61014 11.7309 9.61014ZM6.77984 11.9983C6.77984 9.30112 9.0408 7.19322 11.7309 7.19322C14.421 7.19322 16.682 9.30112 16.682 11.9983C16.682 14.6955 14.421 16.8034 11.7309 16.8034C9.0408 16.8034 6.77984 14.6955 6.77984 11.9983Z" fill="white"/>
                    </svg>
                </div>
            </a>
            <a href="/profile">
                <div><img class="w-full h-[40px] rounded-full object-cover" :src="avatarUrl" /></div>
                <div class="text-center text-white mt-[3px] text-sm">{{ user.name }}</div>
            </a>
            <div class="flex">
                <div class="mx-auto rounded bg-[#32384D] p-3">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M5.33004 2.65613C3.85327 2.65613 2.65613 3.85328 2.65613 5.33002V18.67C2.65613 20.1467 3.85327 21.3439 5.33004 21.3439H18.67C20.1467 21.3439 21.3439 20.1467 21.3439 18.67V12.6669C21.3439 11.9335 21.9385 11.3389 22.6719 11.3389C23.4054 11.3389 24 11.9335 24 12.6669V18.67C24 21.6137 21.6136 24 18.67 24H5.33004C2.38635 24 0 21.6137 0 18.67V5.33002C0 2.38632 2.38635 0 5.33004 0H10.666C11.3995 0 11.9941 0.594594 11.9941 1.32806C11.9941 2.06153 11.3995 2.65613 10.666 2.65613H5.33004ZM19.337 2.65613C18.2286 2.65613 17.33 3.55465 17.33 4.66302C17.33 5.7714 18.2286 6.66992 19.337 6.66992C20.4454 6.66992 21.3439 5.7714 21.3439 4.66302C21.3439 3.55465 20.4454 2.65613 19.337 2.65613ZM14.6739 4.66302C14.6739 2.0877 16.7616 0 19.337 0C21.9123 0 24 2.0877 24 4.66302C24 7.23835 21.9123 9.32605 19.337 9.32605C16.7616 9.32605 14.6739 7.23835 14.6739 4.66302Z" fill="#33CCFF"/>
                    </svg>
                </div>
            </div>
        </div>
        <div class="text-[#7A8299] text-center mt-4">Total earned</div>
        <div class="balance-text text-white text-center text-5xl mt-3 font-bold">$ {{ user.balance }}</div>
        <div class="max-w-md mx-auto p-5">
            <form @submit.prevent="updateProfile">
                <div class="input-wrapper">
                    <input
                        v-model="form.email"
                        type="email"
                        class="input-field"
                        id="email-input"
                        placeholder=" "
                        :disabled="!editable"
                    />
                    <label for="email-input" class="input-placeholder">Email</label>
                </div>
                <div class="input-wrapper">
                    <input
                        v-model="form.name"
                        type="text"
                        class="input-field"
                        id="name-input"
                        placeholder=" "
                        :disabled="!editable"
                    />
                    <label for="name-input" class="input-placeholder">Name</label>
                </div>
                <div class="input-wrapper flex justify-center items-center">
                    <input
                        type="file"
                        class="hidden"
                        id="avatar-input"
                        @change="handleFileUpload"
                        ref="avatarInput"
                    />
                    <div class="flex w-full py-2 px-5 rounded-lg items-center bg-[#2E3440]">
                        <div class='text-[#656D85]'>Avatar</div>
                        <img
                            @click="triggerFileInput"
                            class="ml-auto cursor-pointer w-[40px] h-[40px] rounded-full border-2 border-[#0095FF]"
                            :src="avatarUrl"
                            alt="Upload Avatar"
                        />
                    </div>
                </div>
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
import axios from 'axios';

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
                avatar_file: null,
            },
            editable: false,
        };
    },
    computed: {
        avatarUrl() {
            return this.user.avatar_url === 'default_avatar.png'
                ? `https://srv451534.hstgr.cloud/images/${this.user.avatar_url}`
                : `https://srv451534.hstgr.cloud/storage/${this.user.avatar_url}`;
        },
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
        triggerFileInput() {
            this.$refs.avatarInput.click();
        },
        handleFileUpload(event) {
            this.form.avatar_file = event.target.files[0];
        },
        async updateProfile() {
            if (this.editable) {
                const formData = new FormData();
                formData.append('email', this.form.email);
                formData.append('name', this.form.name);
                if (this.form.password) {
                    formData.append('password', this.form.password);
                }
                if (this.form.avatar_file) {
                    formData.append('avatar_url', this.form.avatar_file);
                }

                try {
                    await axios.post('/update', formData, {
                        headers: {
                            'Content-Type': 'multipart/form-data'
                        }
                    });
                    this.editable = false;
                } catch (error) {
                    console.error('Error updating profile:', error);
                }
            } else {
                this.editable = true;
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
    background-size: cover;
}
.input-wrapper {
    position: relative;
    margin-top: 0.5rem;
}

.input-field {
    width: 100%;
    padding: 1rem;
    border-radius: 0.375rem;
    background-color: #2E3440;
    color: #fff;
    border: none;
    box-shadow: none;
    outline: none;
    text-align: right;
}

.input-placeholder {
    position: absolute;
    top: 50%;
    left: 1rem;
    transform: translateY(-50%);
    color: #9E9E9E;
    pointer-events: none;
    transition: all 0.2s ease-in-out;
    font-size: 0.875rem;
    font-weight: 400;
    background: #2E3440; /* Match input background color */
    padding: 0 0.25rem;
}

.input-field:focus + .input-placeholder,
.input-field:not(:placeholder-shown) + .input-placeholder {
    top: 50%;
    left: 1rem;
    font-size: 0.875rem;
    color: #656D85;
}

.hidden {
    display: none;
}

.balance-text {
    text-shadow: 0 0 10px rgba(255, 255, 255, 0.7);
}
</style>
