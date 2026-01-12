<template>
    <div class="layout">
    <SideNav />
    <main>
        <h3 class="comment-title">コメント</h3>
<!--ポスト内容-->
            <div class="post">
                <ul>
                    <li v-for="post in posts" :key="post.id">
                        <div class="post-header">
                            <span class="user-name">{{ post.name }}</span>
                            <button class="like-button">♥</button>
                            <span class="like-count">{{ post.likes_count }}</span>
                        </div>
                        <p class="post-message">{{ post.message }}</p>
                    </li>
                </ul>
            </div>
            <p class="comment">コメント</p>
<!--コメント内容-->
        <ul>
            <li>
                <div class="comment-header">
                    <span class="comment-name">{{ post.name }}</span>
                    <p class="comment-message">{{ post.message }}</p>
                </div>
            </li>
        </ul>
<!--入力欄-->
        <div class="comment-form">
            <form @submit.prevent="submit">
                <input type="text" class="comment-field"  v-model="input">
                <button class="comment-button">コメント</button>
            </form>
        </div>
    </main>
    </div>
</template>

<script setup>
const posts = [
    {
        id: 1,
        name: 'dami1',
        message: '初めての投稿',
        likes_count:3
    }
]

const post ={
        id: 1,
        name: 'dami1',
        message: '初めてのコメント',
}

import { ref } from 'vue'
const input = ref('')
const submit = () => {
    console.log(input.value)
}
</script>