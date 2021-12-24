# Laravel HTML style attribute builder

- `composer a:routes` Use `artisan route:list` and write the output to `routes.txt`.
- `composer c:c` Use `artisan` to clear **cache**, **route**, **config** and **view** files.
- `composer m:c` Create `sessions`, `views` and `sessions` directories in `storage/framework` then chomd `storage/framework` 775 for the user as owner.


**Example:** :
```
  $p = app('style-attribute')
        ->cursor('pointer', true)
        ->backgroundColor('var(--primary)', true);

  dd( "<label style='{$p}'>Label</label>" );
  ```


## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

The Laravel HTML style attribute builder is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
