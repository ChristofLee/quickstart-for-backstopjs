# Quickstart for BackstopJS

A Wordpress plugin to get testing quickly with BackstopJS.

## Getting Started

These instructions will get you a copy of the project up and running on your local machine for development and testing purposes. See deployment for notes on how to deploy the project on a live system.

### Prerequisites

- An up-to-date Wordpress install
- BackstopJS ([how to install](https://www.christoflee.co.uk/backstopjs-a-beginners-guide-to-testing-in-wordpress/))

### Installing

**Download the repo**

- Download the repository to your `wp-content/plugins` directory
- Extract the zip
- Rename the folder to `quickstart-for-backstopjs`

**Clone the repo**

Clone the repository to your `wp-content/plugins` directory

- Go to your plugins directory `cd wp-content/plugins`
- Clone the repo into the directory


## Testing

**Manual Testing**

To test the plugin:
- Create a new WP install
- Install test data from [wptest.io](http://wptest.io/)
- Initialise BackstopJS
- Go to the plugin in `wp-admin -> tools -> backstopjs`
- Copy the outputted config to `backstop.json`
- Run BackstopJS tests
- Confirm your output works

**Automated Testing**

_Coming soon_

## Contributing

Please read [CONTRIBUTING.md](https://gist.github.com/PurpleBooth/b24679402957c63ec426) for details on our code of conduct, and the process for submitting pull requests to us.

## Versioning

We use [SemVer](http://semver.org/) for versioning. For the versions available, see the [tags on this repository](https://github.com/your/project/tags). 

## Authors

* **Christof Lee** - *Initial work* - [PurpleBooth](https://github.com/christoflee)

## License

This project is licensed under the MIT License - see the [LICENSE.md](LICENSE.md) file for details
