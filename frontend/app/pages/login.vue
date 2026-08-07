<template>
    <AuthHeader />
    <main>
        <div class="login-form">
            <form @submit.prevent="submit">
            <h3 class="login-title">ログイン</h3>
                <div class="form-name">
                    <input type="email" v-model="email.value.value" placeholder="メールアドレス">
                    <p>{{ email.errors.value[0] }}</p>
                </div>
                <div class="form-password">
                    <input type="password" v-model="password" placeholder="パスワード">
                <p>{{ password.errors.value[0] }}</p>
                </div>
                <button class="form-button">ログイン</button>
            </form>
        </div>
    </main>
</template>

<script setup>
import '~/assets/css/login.css'
import { signInWithEmailAndPassword } from 'firebase/auth'
import { auth } from '../../utils/firebase'

import { useForm, useField,defineRule } from 'vee-validate'
import { required, email as emailRule, min } from '@vee-validate/rules'

defineRule('required', required)
defineRule('email', emailRule)
defineRule('min', min)

const { handleSubmit } = useForm()

const email = useField('email','required|email',{label:'メールアドレス'})
const password = useField('password','required|min:6',{label:'パスワード'})

const submit = async () => {
    try {
        const userCredential = await signInWithEmailAndPassword(
            auth,
            email.value,
            password.value
        )
        console.log('ログイン成功')
        console.log(userCredential.user)

        await navigateTo('/')

    } catch (error) {
        console.error('ログイン失敗', error)
    }
}
</script>