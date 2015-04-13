## Doctrine ORM 2 Step Hydration

This repository is an example of how to implement 2 step hydration with Doctrine ORM.

Examples will be provided with the repository itself.

You can read more about the concept behind this repository at https://ocramius.github.io/blog/doctrine-orm-optimization-hydration

### Running the examples

Simply open your terminal and run

```sh
./run.sh
```

To play around with the amount of records in each table, you can define environment variables:


```sh
USERS=1000 SOCIAL_ACCOUNTS=15 SESSIONS=20 ./run.sh
```
