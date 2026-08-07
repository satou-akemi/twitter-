<template>
    <div class="layout">
    <SideNav />
    <main>
        <h3 class="comment-title">コメント</h3>
<!--ポスト内容-->
            <div class="post">
                <div class="post-header">
                    <span class="user-name">{{ post.user.name }}
                    </span>
                    <button class="like-button">
                        <img src="/assets/heart.png" alt="♡" class="heart-logo">
                    </button>
                    <span class="like-count">{{ post.likes_count }}
                    </span>
                </div>
                    <p class="post-message">{{ post.text }}
                    </p>
            </div>
            <p class="comment">コメント</p>
<!--コメント内容-->
        <ul class="comment-list">
            <li v-for="comment in comments" :key="comment.id">
                <div class="comment-header">
                    <span class="comment-name">{{ comment.user.name }}</span>
                    <p class="comment-message">{{ comment.text }}</p>
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
import { ref } from 'vue'
import { routeLocationKey } from 'vue-router'

const route = useRoute()
const post = ref({})
const fetchPost = async () => {
    post.value = await $fetch(
        `http://localhost/api/posts/${route.params.id}`
    )
}
await fetchPost()

const comments = ref([])

const fetchComments = async () => {
    comments.value = await $fetch(
        `http://localhost/api/posts/${post.value.id}/comments`
    )
}

await fetchComments()

const input = ref('')

const submit = async () => {
    const res = await $fetch(
        `http://localhost/api/posts/${post.value.id}/comments`,
        {
            method: 'POST',
            body: {
            text:input.value
        }
    }
    )
    console.log(res)

    await fetchComments()
    input.value = ''
}
</script>
