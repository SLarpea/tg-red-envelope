import Pusher from "pusher-js";

const { VITE_PUSHER_APP_CLUSTER, VITE_PUSHER_APP_KEY } = import.meta.env;

const pusher = new Pusher(VITE_PUSHER_APP_KEY, {
    cluster: VITE_PUSHER_APP_CLUSTER,
});

export default pusher;
