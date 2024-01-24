import Pusher from 'pusher-js';

const pusher = new Pusher('fe2ca590e59ed597a8cc', {
  cluster: 'ap1'
});

export default pusher;
