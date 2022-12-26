package com.faboslav.friendsandfoes.flowerymooblooms.fabric;

import com.faboslav.friendsandfoes.flowerymooblooms.FloweryMooblooms;
import net.fabricmc.api.ModInitializer;

public final class FloweryMoobloomsFabric implements ModInitializer
{
	@Override
	public void onInitialize() {
		FloweryMooblooms.postInit();
	}
}
