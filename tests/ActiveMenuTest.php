<?php

use Sahib\ActiveMenu\ActiveMenu;
use Illuminate\View\Compilers\BladeCompiler;

class ActiveMenuTest extends TestCase
{
    public function test_binding()
    {
        $this->assertInstanceOf(ActiveMenu::class, app('sahib_active_menu'));
    }

    public function test_activate_menu()
    {
        $activeMenu = new ActiveMenu;
        $activeMenu->activate('active-menu');

        $this->assertNull($activeMenu->active('inactive-menu'));
        $this->assertEquals('active', $activeMenu->active('active-menu'));
        $this->assertEquals('custom-class', $activeMenu->active('active-menu', 'custom-class'));
    }

    public function test_blade_directives()
    {
        $compiler = app(BladeCompiler::class);

        $this->assertEquals(
            "<?php echo app('sahib_active_menu')->activate('menu') ?>",
            $compiler->compileString("@activate('menu')")
        );

        $this->assertEquals(
            "<?php echo app('sahib_active_menu')->active('menu') ?>",
            $compiler->compileString("@active('menu')")
        );

        $this->assertEquals(
            "<?php echo app('sahib_active_menu')->active('menu', 'class') ?>",
            $compiler->compileString("@active('menu', 'class')")
        );
    }
}
