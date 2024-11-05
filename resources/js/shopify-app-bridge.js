import { AppBridge } from '@shopify/app-bridge';
import { Redirect } from '@shopify/app-bridge/actions';

const app = AppBridge({
    apiKey: 'YOUR_API_KEY', // Replace with your app's API key
    shopOrigin: 'YOUR_SHOP_ORIGIN', // Replace with the shop's origin
    forceRedirect: true,
});

// Example: Redirecting to a different URL
const redirect = Redirect.create(app);
redirect.dispatch(Redirect.Action.APP, '/your-path'); // Change '/your-path' as needed
