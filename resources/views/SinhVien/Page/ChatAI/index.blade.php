@extends('SinhVien.Share.master')
@section('content')
<div id="chat-app" class="container-fluid py-4">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    <h5 class="mb-0 text-white">Chat với AI</h5>
                </div>
                <div class="card-body" style="height: 600px; overflow-y: auto; background: #f8f9fa;">
                    <div v-for="(msg, idx) in messages" :key="idx" class="mb-3">
                        <div :class="msg.role == 'user' ? 'text-end' : 'text-start'">
                            <span :class="msg.role == 'user' ? 'badge bg-info' : 'badge bg-secondary'">
                                @{{ msg.role == 'user' ? 'Bạn' : 'AI' }}
                            </span>
                            <div class="d-inline-block px-3 py-2 rounded" :class="msg.role == 'user' ? 'bg-light' : 'bg-white'" style="max-width: 70%;">
                                @{{ msg.text }}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer bg-white">
                    <form @submit.prevent="sendMessage" class="d-flex align-items-center">
                        <input v-model="input" type="text" class="form-control me-2" placeholder="Nhập tin nhắn..." autocomplete="off" required>
                        <button class="btn btn-primary" type="submit">Gửi</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('js')
<script src="https://cdn.jsdelivr.net/npm/vue@3.4.21/dist/vue.global.prod.js"></script>
<script>
const { createApp } = Vue;
createApp({
    data() {
        return {
            input: '',
            messages: [
                { text: 'Xin chào! Tôi có thể giúp gì cho bạn?', role: 'model' }
            ]
        }
    },
    methods: {
        sendMessage() {
            if (!this.input.trim()) return;
            this.messages.push({ text: this.input, role: 'user' });
            const userMsg = this.input;
            this.input = '';
            // Giả lập trả lời của AI, bạn có thể thay bằng gọi API thực tế
            axios.post('/sinh-vien/chat-ai', {messages : this.messages})
                .then((res) => {
                    console.log(res.data);
                    this.messages.push({ text: 'AI: ' + res.data.message, role: 'model' });
                })
                .catch(error => {
                    console.error('Error:', error);
                    this.messages.push({ text: 'Đã xảy ra lỗi. Vui lòng thử lại.', role: 'model' });
                });
        }
    }
}).mount('#chat-app');
</script>
@endsection