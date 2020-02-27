The scaling code sample is intended to help developers automatically scale all the application screens to the size of the user's monitor.

Its demo can be activated from the `Developer Tools\Demo Scaling` menu.

Here's how it works,

When you click on the menu the method `ToggleScalingDemo` in the `Form` class in `ENV` is called.

It then calls the `GetCurrentScreenSize` method, which opens a form with `FitToMdi = true` and measures it's size to know that size of the current user screen.

Then it calls the `MatchScreenSize` method, which sets the `ScalingFactor` that will be used to scale all the forms that are opened from now on. 

## How is the Scaling Factor Determined?
The scaling factor is the ratio between the original screen width used in the development and the current width of the screen.

For example, if the original developer screen width was 900 and the current screen width is 1800 then the scaling factor for the width will be 2.

## How is the original developer screen width determined
By default, the scaling code demo tries to deduce the original developer screen width, by recording the bottom right position of all the screens that were opened so far in the application.

These values are stored in the `_maxBottom` and `_maxRight` fields.

And are updated in the `OnBeforeBinding` method see:
```csdiff
        protected override void OnBeforeBinding()
        {
            base.OnBeforeBinding();
            var s = new Size(Right, Bottom);
            if (StartPosition != WindowStartPosition.Custom)
                s = new Size(Width, Height);
+           if (OriginalSizeForScaling == Size.Empty && !FitToMDI)
+           {
+               if (s.Height > _maxBottom)
+                   _maxBottom = s.Height;
+               if (s.Width > _maxRight && s.Width < 1200)
+                   _maxRight = s.Width;
+           }
            if (AutomaticResizeScreens)
            {
                ScalingFactor = new SizeF((float)_mdiWidth / _maxRight, (float)_mdiHeight / _maxBottom);
            }
            if (_scalingFactor != new SizeF(1, 1))
                Scale(_scalingFactor);
...
        }

```

Although this is useful for a demo, in real life it can cause some trouble. 
Imagine the following scenario, 
1. The user started the application and opened a small screen.
2. the user runs the Scaling demo - and the scale is set to 2.
3. Now every screen will open with a scale of 2.
4. At this time, the user opens another screen that was developed to be very wide.
5. This will change the scaling factor and affect all the following screens.


### How can we set the original developer screen sizes?
This can be done by calling the `SetOriginalSize` when the application starts. Note that the size is not 1024 X 768 or the actual screen width, you actually need the size of the area where screens can be opened (without the menus, etc...) for example, in a screen where the resolution is 800 X 600 the size we used was 804, 489 (see the code for the `SetOriginalSizeTo800X600` method).

We recommend that you experiment with several different values until you've reached your desired result.

### Can we set a different scaling factor for different screens?
You  can customize the scaling factors for each screen by simply setting the ScalingFactor property to the factor that you want before the `OnBeforeBinding` method is called.
