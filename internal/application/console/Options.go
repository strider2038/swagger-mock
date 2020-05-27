package console

type Options struct {
	CommandName    string `no-flag:"true"`
	Version        bool   `short:"v" long:"version" description:"Shows version of the application."`
	ConfigFilename string `short:"c" long:"configuration" description:"Destination to configuration filename in JSON/YAML format. By default configuration is loaded from 'openapi-mock.yaml', 'openapi-mock.yml' or 'openapi-mock.json'."`
	URL            string `short:"u" long:"specification-url" description:"URL or path to file with OpenAPI v3 specification."`
}
