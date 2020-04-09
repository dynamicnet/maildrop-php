# API documentation

This page will document the API classes and ways to properly use the API.

## Generalities
* All API methods that use parameters must receive an associative array.
* All parameters accepting a date and time can receive a [DateTime](https://www.php.net/manual/en/class.datetime.php) object indicating a timezone.

## Lists API

### Create a contact list
[Show me an example](/examples/list-create.php)
```php
$maildrop->lists()->create([
    "name" => "My contacts list"
]);
```

### Retrieve a collection of contact list
[Show me an example](/examples/list-get.php)
```php
$maildrop->lists()->get([
    "sort_field" => "name",
    "sort_dir" => "asc"
]);
```

### Delete a contact list
[Show me an example](/examples/list-delete.php)
```php
$maildrop->lists()->delete([
    "listid" => "XXXXXXXXXXXXXXXXXXX"
]);
```

## Custom fields API
### Add a custom field to a contact list
[Show me an example](/examples/list-add-customfield.php)
```php
$maildrop->custom_fields()->add();
```


## Segments API
### Add a segment to a contact list
[Show me an example](/examples/list-add-segment.php)
```php
$maildrop->segments()->add();
```

## Campaigns API
### Retrieve a collection of campaigns
[Show me an example](/examples/campaigns-get.php)
```php
$maildrop->campaigns()->get();
```
### Create an email campaign
[Show me an example](/examples/campaign-create.php)
```php
$maildrop->campaigns()->create();
```

### Schedule an email campaign for later sending
[Show me an example](/examples/campaign-schedule.php)
```php
$maildrop->campaigns()->schedule();
```

### Schedule an email campaign for immediate sending
[Show me an example](/examples/campaign-send.php)
```php
$maildrop->campaigns()->send();
```

### Delete an email campaign
[Show me an example](/examples/campaign-delete.php)
```php
$maildrop->campaigns()->delete();
```

## Subscribers API
### Add a contact to a contact list
[Show me an example](/examples/subscribe-to-list.php)
```php
$maildrop->subscribers()->add();
```

### Add a contact to a contact list and force resubscribe it
[Show me an example](/examples/subscribe-to-list-and-force-resubscribe.php)
```php
$maildrop->subscribers()->add_and_resubscribe();
```

### Add many contacts to a contact list
[Show me an example](/examples/subscribe-batch.php)
```php
$maildrop->subscribers()->import_batch();
```

### Asynchronously import contacts via a CSV file
[Show me an example](/examples/subscribe-import-csv-by-url.php)
```php
$maildrop->subscribers()->import_by_url();
```

### Check the status of an asynchronously import
[Show me an example](/examples/subscribe-get-task-status.php)
```php
$maildrop->subscribers()->import_by_url_get_status();
```

### Unsubscribe one or many contacts from a list
[Show me an example](/examples/unsubscribe-from-list.php)
```php
$maildrop->subscribers()->unsubscribe();
```

### Get many details of a contact
[Show me an example](/examples/subscribe-getdetails.php)
```php
$maildrop->subscribers()->get_details();
```

## Reports API
### Retrieve the recipients
[Show me an example](/examples/reports-get-recipients.php)
```php
$maildrop->reports()->recipients();
```

### Retrieve the openers
[Show me an example](/examples/reports-get-opens.php)
```php
$maildrop->reports()->opens();
```

### Retrieve the bounces
[Show me an example](/examples/reports-get-bounces.php)
```php
$maildrop->reports()->bounces();
```

### Retrieve the unsubscribes
[Show me an example](/examples/reports-get-unsubscribes.php)
```php
$maildrop->reports()->unsubscribes();
```

### Retrieve the clicked URL
[Show me an example](/examples/reports-get-clicks.php)
```php
$maildrop->reports()->clicks();
```

### Retrieve the clickers of an URL
[Show me an example](/examples/reports-get-clicks-details.php)
```php
$maildrop->reports()->clicks_details();
```

## Ips Pool API
### List pool of dedicated IP on your account
[Show me an example](/examples/ips-of-an-ip-pool.php)
```php
$maildrop->ip_pools()->get();
```

### List IPs of an IP pool
[Show me an example](/examples/ips-of-an-ip-pool.php)
```php
$maildrop->ip_pools()->ips();
```
