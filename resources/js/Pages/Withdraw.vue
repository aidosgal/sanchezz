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
        <div class="text-[#7A8299] text-center mt-3">Total balance</div>
        <div class="balance-text text-white text-center text-5xl font-bold">$ {{ user.balance }}</div>
        <div class="text-[#7A8299] text-center mt-2">This month</div>
        <div class="flex">
            <div class="flex mx-auto">
                <div class="flex items-center gap-2">
                    <svg width="15" height="14" viewBox="0 0 15 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M4.56497 3.5C5.86943 1.16667 6.52166 0 7.5 0C8.47835 0 9.13057 1.16667 10.435 3.5L13.3701 8.75C14.6745 11.0833 15.3268 12.25 14.8376 13.125C14.3484 14 13.044 14 10.435 14H4.56496C1.95605 14 0.651585 14 0.162413 13.125C-0.32676 12.25 0.32547 11.0833 1.62993 8.75L4.56497 3.5Z" fill="#00C0A0"/>
                    </svg>
                    <div class="text-white text-lg">$ {{ totalGained }}<span class="text-[#656D85]">.00</span></div>
                </div>
                <div class="flex items-center ml-4 gap-2">
                    <svg width="15" height="14" viewBox="0 0 15 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M4.56497 10.5C5.86943 12.8333 6.52166 14 7.5 14C8.47835 14 9.13057 12.8333 10.435 10.5L13.3701 5.25C14.6745 2.91667 15.3268 1.75 14.8376 0.874999C14.3484 -7.20488e-07 13.044 -3.9582e-07 10.435 -3.9582e-07H4.56496C1.95605 -3.9582e-07 0.651585 -7.20488e-07 0.162413 0.874999C-0.32676 1.75 0.32547 2.91667 1.62993 5.25L4.56497 10.5Z" fill="#FF4D4E"/>
                    </svg>
                    <div class="text-white text-lg">$ {{ totalWasted }}<span class="text-[#656D85]">.00</span></div>
                </div>
            </div>
        </div>
        <div class="flex w-full mt-4">
            <div class="text-white flex mx-auto">
                <a href="/deposit" class="items-center gap-2 flex px-8 bg-[#32384D] py-3 rounded-l-full">
                    <svg width="12" height="13" viewBox="0 0 12 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M8.63581 2.47071L1.92651 2.4708C1.38232 2.47081 0.941165 2.02967 0.941158 1.48548C0.94115 0.941293 1.38229 0.500137 1.92648 0.500129L11.0146 0.5C11.276 0.499996 11.5266 0.603807 11.7114 0.788594C11.8962 0.973381 12 1.22401 12 1.48534V10.4442C12 10.9884 11.5588 11.4296 11.0147 11.4296C10.4705 11.4296 10.0293 10.9884 10.0293 10.4442V3.86415L1.68208 12.2114C1.29728 12.5962 0.673397 12.5962 0.288599 12.2114C-0.0961995 11.8266 -0.0961995 11.2027 0.288599 10.8179L8.63581 2.47071Z" fill="white"/>
                    </svg>
                    <div>Deposit</div>
                </a>
                <a href="/withdraw" class="items-center gap-2 flex px-8 bg-[#8972FF] py-3 rounded-r-full">
                    <svg width="13" height="13" viewBox="0 0 13 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M0.788598 0.788599C1.1734 0.4038 1.79728 0.4038 2.18208 0.788599L10.5293 9.13581L10.5292 2.42651C10.5292 1.88232 10.9703 1.44116 11.5145 1.44115C12.0587 1.44115 12.4999 1.88229 12.4999 2.42648L12.5 11.5146C12.5 11.776 12.3962 12.0266 12.2114 12.2114C12.0266 12.3962 11.776 12.5 11.5147 12.5H2.55575C2.01156 12.5 1.57041 12.0588 1.57041 11.5147C1.57041 10.9705 2.01156 10.5293 2.55575 10.5293H9.13585L0.788599 2.18208C0.403801 1.79728 0.4038 1.1734 0.788598 0.788599Z" fill="white"/>
                    </svg>
                    <div>Withdraw</div>
                </a>
            </div>
        </div>
        <div class="flex w-full">
            <div class="mx-auto w-full px-7 mt-3">
                <div class="flex items-center py-2 justify-between mb-3">
                    <div
                        class="text-white"
                        @click="toggleForm"
                    >
                        <svg width="8" height="10" viewBox="0 0 8 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M8 0L0 5L8 10V0Z" fill="white"/>
                        </svg>
                    </div>
                    <div class="text-white text-lg font-semibold">{{ formType }}</div>
                    <div
                        class="text-white"
                        @click="toggleForm"
                    >
                        <svg width="8" height="10" viewBox="0 0 8 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M0 0L8 5L0 10V0Z" fill="white"/>
                        </svg>
                    </div>
                </div>
                <form v-if="formType === 'Card'" @submit.prevent="submitForm">
                    <div class="input-wrapper mt-2">
                        <input
                            v-model="form.amount"
                            type="number"
                            class="input-field"
                            id="amount-input"
                            placeholder=" "
                        />
                        <label for="amount-input" class="input-placeholder">Amount</label>
                    </div>
                    <div class="input-wrapper">
                        <input
                            v-model="form.card_number"
                            type="text"
                            class="input-field"
                            id="card-number-input"
                            placeholder=" "
                        />
                        <label for="card-number-input" class="input-placeholder">Card Number</label>
                    </div>
                    <button
                        :class="buttonClasses"
                        class="block text-lg w-full py-3 font-bold mt-5 rounded-full"
                        :disabled="!isFormValid"
                    >
                        Confirm
                    </button>
                </form>
                <form v-if="formType === 'Crypto'" @submit.prevent="submitForm">
                    <div class="input-wrapper">
                        <input
                            v-model="form.amount"
                            type="number"
                            class="input-field"
                            id="amount-input"
                            placeholder=" "
                        />
                        <label for="amount-input" class="input-placeholder">Amount</label>
                    </div>
                    <div class="input-wrapper">
                        <input
                            type="number"
                            class="input-field"
                            id="wallet-input"
                            placeholder=" "
                        />
                        <label for="wallet-input" class="input-placeholder">Wallet Address</label>
                    </div>
                    <button
                        :class="buttonClasses"
                        class="block text-lg w-full py-3 font-bold mt-5 rounded-full"
                        :disabled="!isFormValid"
                    >
                        Confirm
                    </button>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
import axios from "axios";
export default {
    props: {
        user: {
            type: Object,
            required: true
        },
        totalGained: {
            type: Number,
            required: true
        },
        totalWasted: {
            type: Number,
            required: true
        }
    },
    data() {
        return {
            form: {
                amount: 0,
                card_number: "",
                exp_date: "",
                cvc: "",
                wallet: "",
                error: null,
            },
            formType: 'Card',
        };
    },
    computed: {
        avatarUrl() {
            return this.user.avatar_url === 'default_avatar.png'
                ? `https://srv451534.hstgr.cloud/images/${this.user.avatar_url}`
                : `https://srv451534.hstgr.cloud/storage/${this.user.avatar_url}`;
        },
        isFormValid() {
            return true;
        },
        buttonClasses() {
            return this.isFormValid
                ? "text-white bg-[#0095FF]"
                : "text-[#656D85] bg-[#292F40]";
        },
    },
    methods: {
        toggleForm() {
            if (this.formType === 'Card') {
                this.formType = 'Crypto';
            } else {
                this.formType = 'Card';
            }
        },
        async submitForm() {
            try {
                const response = await axios.post('/balance/update', {
                    amount: this.form.amount,
                    transaction_type: 'waste',
                    description: 'User waste'
                });
                if (response.data.success) {
                    this.user.balance = response.data.balance;
                }
            } catch (error) {
                this.form.error = 'An error occurred while processing your request.';
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

.input-left-placeholder::placeholder {
    text-align: left;
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
