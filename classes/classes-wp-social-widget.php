<?php

// WP Social Widget class
class WPSocialWidget extends WP_Widget {
    // WPSocialWidget construct
    function __construct() {
        $wpsw_id_base = 'wpsw-id';
        $wpsw_name = 'WP Social Widget';

        $widget_options = array(
            'description' => __('Display links to social networks.', 'wpsw'),
            'classname' => 'wpsw-class'
        );

        $control_options = array(
            'id_base' => $wpsw_id_base
        );

        // set widget args
        parent::__construct(
            $wpsw_id_base,
            $wpsw_name,
            $widget_options,
            $control_options
        );
    }

    // Update the widget
    function update($new_instance, $old_instance) {
        // remove html tags from $new_instance
        foreach ($new_instance as $item) {
            $item['title'] = strip_tags($item['title']);
            $item['class'] = strip_tags($item['class']);
            $item['link'] = strip_tags($item['link']);
            $item['name'] = strip_tags($item['name']);
        }

        return $new_instance;
    }

    // Render the windget for front
    function widget($args, $instance) {
        $template_path = dirname(__DIR__);

        include_once($template_path . '/templates/templates-widget.php');
    }

    // Render the windget for admin panel
    function form($instance) {
        if (count($instance) < 1) {
            $instance = array(
                array(
                    'class' => '',
                    'title' => '',
                    'link' => '',
                    'name' => ''
                )
            );
        }

        $widget_field_count = 0;

        $widget_field_name = 'widget-' . $this->id_base . '[' . $this->number . ']';
        $widget_field_id = 'widget-' . $this->id_base . '-' . $this->number . '-';

        foreach ($instance as $item) :

        ?>

        <?php if ($widget_field_count > 0) : ?>

        <hr>

        <?php endif; ?>

        <p>
            <label for="<?php echo $widget_field_id . $widget_field_count . '-class'; ?>">
                <?php _e('Icon name (Font Awesome Icon):', 'wpsw'); ?>
            </label>

            <input id="<?php echo $widget_field_id . $widget_field_count . '-class'; ?>"
                   name="<?php echo $widget_field_name . '[' . $widget_field_count . '][class]'; ?>"
                   value="<?php echo $item['class']; ?>"
                   style="width: 100%;" />
        </p>

        <p>
            <label for="<?php echo $widget_field_id . $widget_field_count . '-title'; ?>">
                <?php _e('Title text for link:', 'wpsw'); ?>
            </label>

            <input id="<?php echo $widget_field_id . $widget_field_count . '-title'; ?>"
                   name="<?php echo $widget_field_name . '[' . $widget_field_count . '][title]'; ?>"
                   value="<?php echo $item['title']; ?>"
                   style="width: 100%;" />
        </p>

        <p>
            <label for="<?php echo $widget_field_id . $widget_field_count . '-link'; ?>">
                <?php _e('Link for social group', 'wpsw'); ?>
            </label>

            <input id="<?php echo $widget_field_id . $widget_field_count . '-link'; ?>"
                   name="<?php echo $widget_field_name . '[' . $widget_field_count . '][link]'; ?>"
                   value="<?php echo $item['link']; ?>"
                   style="width: 100%;" />
        </p>

        <p>
            <label for="<?php echo $widget_field_id . $widget_field_count . '-name'; ?>">
                <?php _e('Text of link', 'wpsw'); ?>
            </label>
            <input id="<?php echo $widget_field_id . $widget_field_count . '-name'; ?>"
                   name="<?php echo $widget_field_name . '[' . $widget_field_count . '][name]'; ?>"
                   value="<?php echo $item['name']; ?>"
                   style="width: 100%;" />
        </p>
        <?php

        $widget_field_count++;

        endforeach;
    }
}