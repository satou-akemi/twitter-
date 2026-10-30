<template>
    <AuthHeader />
    <main>
        <div class="login-form">
            <form @submit.prevent="submit">
            <h3 class="login-title">ログイン</h3>
                <div class="form-name">
                    <input type="email" v-model="email" placeholder="メールアドレス">
                    <p v-if="errors.email" class="errors">{{ errors.email }}</p>
                </div>
                <div class="form-password">
                    <input type="password" v-model="password" placeholder="パスワード">
                    <p v-if="errors.password" class="errors">{{errors.password }}</p>
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

import { useForm } from 'vee-validate'

const { defineField, handleSubmit, errors } = useForm({
    validationSchema: {
        email: (value) => {
        if (value) {
        return true
        }

        return 'メールアドレスを入力してください'
    },

    password: (value) => {
        if (value) {
        return true
        }

        return 'パスワードを入力してください'
    }
    }
})

const [email] = defineField('email')
const [password] = defineField('password')

const submit = handleSubmit(async () => {
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
})
</script>