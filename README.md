# WORDPRESS REST API Endpoints Talaadthai
Talaadthai endpoints for the WP REST API

**Get Markets:**
```
GET /wp-json/wp-api-tlt/v1/markets
```

**Get Markets with Categories Slug:**
```
GET /wp-json/wp-api-tlt/v1/markets/(?P<id>[\d]+)
```

**Get Markets with Categories and Sub Categories Slug:**
```
GET /wp-json/wp-api-tlt/v1/markets/(?P<id>[\d]+)/(?P<id>[\d]+)
```

**Get Product by Favorites Max 10 Results:**
```
GET /wp-json/wp-api-tlt/v1/product
```

**API Search Product:**
```
GET /wp-json/wp-api-tlt/v1/product-search
```

```
GET /wp-json/wp-api-tlt/v1/products-with-subcats
```

**API Search Vendor:**
```
GET /wp-json/wp-api-tlt/v1/vendor-search
```

```
GET /wp-json/wp-api-tlt/v1/vendors-with-subcats
```
