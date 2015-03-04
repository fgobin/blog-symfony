<?php

namespace Blogger\AdminBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class BloggerAdminBundle extends Bundle
{
    public function getParent()
    {
        return 'FOSUserBundle';
    }
}
