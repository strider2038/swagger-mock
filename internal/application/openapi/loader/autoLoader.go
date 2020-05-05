package loader

import (
	"github.com/getkin/kin-openapi/openapi3"
	"net/url"
)

type autoLoader struct {
	loader externalLoader
}

func New() SpecificationLoader {
	return &autoLoader{
		loader: openapi3.NewSwaggerLoader(),
	}
}

func (loader *autoLoader) LoadFromURI(uri string) (*openapi3.Swagger, error) {
	specificationUrl, err := url.Parse(uri)
	if err != nil || specificationUrl.Scheme == "" {
		return loader.loader.LoadSwaggerFromFile(uri)
	}

	return loader.loader.LoadSwaggerFromURI(specificationUrl)
}