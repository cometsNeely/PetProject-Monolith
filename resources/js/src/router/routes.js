import Home from '@/pages/Home.vue';
import Show from '@/pages/Show.vue';

const routes = [
	{
		path: '/',
		component: Home,
	},
	{
		path: '/thriller',
		component: Show,
	},
	{
		path: '/drama',
		component: Show,
	},
];

export default routes;