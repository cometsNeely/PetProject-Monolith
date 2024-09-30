import Home from '@/pages/Home.vue';
import Show from '@/pages/Show.vue';

const routes = [
	{
		path: '/',
		component: Home,
	},
	{
		path: '/thriller',
		name: 'Thriller',
		component: Show,
	},
	{
		path: '/drama',
		name: 'Drama',
		component: Show,
	},
	{
		path: '/comedy',
		name: 'Comedy',
		component: Show,
	},
	{
		path: '/boeviki',
		name: 'Boeviki',
		component: Show,
	},
	{
		path: '/foreign',
		name: 'Foreign',
		component: Show,
	},
	{
		path: '/adventures',
		name: 'Adventures',
		component: Show,
	},
	{
		path: '/melodramy',
		name: 'Melodramy',
		component: Show,
	},
	{
		path: '/fantastika',
		name: 'Fantastika',
		component: Show,
	},
	{
		path: '/fentezi',
		name: 'Fentezi',
		component: Show,
	},
	{
		path: '/detective',
		name: 'Detective',
		component: Show,
	},

	/*{
		path: '/show/:id',
		name: 'ShowInfo',
		component: Show,
	}*/
];

export default routes;