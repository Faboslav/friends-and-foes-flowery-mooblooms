package com.faboslav.friendsandfoes.flowerymooblooms.forge;

import com.faboslav.friendsandfoes.flowerymooblooms.FloweryMooblooms;
import net.minecraftforge.eventbus.api.IEventBus;
import net.minecraftforge.fml.common.Mod;
import net.minecraftforge.fml.event.lifecycle.FMLCommonSetupEvent;
import net.minecraftforge.fml.javafmlmod.FMLJavaModLoadingContext;

@Mod(FloweryMooblooms.MOD_ID)
@Mod.EventBusSubscriber(modid = FloweryMooblooms.MOD_ID, bus = Mod.EventBusSubscriber.Bus.FORGE)
public final class FloweryMoobloomsForge
{
	public FloweryMoobloomsForge() {
		IEventBus bus = FMLJavaModLoadingContext.get().getModEventBus();
		bus.addListener(com.faboslav.friendsandfoes.flowerymooblooms.forge.FloweryMoobloomsForge::init);
	}

	private static void init(final FMLCommonSetupEvent event) {
	}
}
